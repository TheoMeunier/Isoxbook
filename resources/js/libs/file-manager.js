import { FileManager } from 'filemanager-element'
import 'filemanager-element/FileManager.css'

const filemanager = document.querySelector('file-manager'),
    btnopen = document.querySelector('#btn-open-filemanager'),
    inputImage = document.querySelector('#input-image-filemanager'),
    image = document.querySelector('#img-filemanager')

if (btnopen) {
    btnopen.addEventListener('click', e => {
        filemanager.removeAttribute('hidden')
    })
}

if (filemanager) {
    filemanager.addEventListener('close', e => {
        if (null !== btnopen) {
            btnopen.classList.remove('d-none')
        }
        filemanager.setAttribute('hidden', '')
    })

    filemanager.addEventListener('selectfile', e => {
        if (null !== inputImage) {
            inputImage.value = e.detail.url
            image.src = e.detail.url
        }

        if (null !== btnopen) {
            btnopen.classList.remove('d-none')
        }

        filemanager.setAttribute('hidden', '')
    })
}

FileManager.register()
