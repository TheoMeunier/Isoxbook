import './bootstrap';
import {createApp} from "vue";

import Books from "./components/books.vue";
import Chapters from "./components/chapters.vue";
import ModalBookDelete from "./components/modal/ModalBookDelete.vue";
import Pages from "./components/pages.vue";
import Logs from "./components/admin/log.vue";
import {createPinia} from "pinia";
import AdminBooks from "./components/admin/books.vue";

const app = createApp();
const pinia = createPinia()

app.use(pinia)

app.component('Books', Books)
app.component('ModalBookDelete', ModalBookDelete)
app.component('Chapters', Chapters)
app.component('Pages', Pages)
app.component('Logs', Logs)
app.component('Books', AdminBooks)

app.mount('#app')
