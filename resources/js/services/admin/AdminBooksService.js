import { ref } from 'vue'

export default function useAdminBook() {
    const books = ref([])

    const getBooks = async page => {
        let response = await axios.get('/webapi/admin/books?page=' + page)
        books.value = response.data
    }

    const search = async query => {
        if (query.length > 3) {
            let response = await axios.get('/webapi/admin/books/' + query)
            books.value = response.data
        } else {
            await getBooks()
        }
    }

    const deleteBook = async slug => {
        await axios.delete('/webapi/admin/books/delete/' + slug)
        await getBooks(1)
    }

    return { books, getBooks, deleteBook, search }
}
