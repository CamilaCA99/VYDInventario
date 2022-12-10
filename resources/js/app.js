import '../css/app.css';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "Sube la imagen aqui!",
    acceptedFiles: '.png, .jpg, .jpeg',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="image"]').value.trim()){
        const imagePost = {}
        imagePost.size = 1234;
        imagePost.name = document.querySelector('[name="image"]').value;

        this.options.addedfile.call(this, imagePost);
        this.options.thumbnail.call(this, imagePost, '/posts/${imagePost.name}');

        imagePost.previewElement.classList.add("dz-success", "dz-complete");
        }
    },
});

dropzone.on("success", function(file, response) {
    document.querySelector('[name="image"]').value = response.image;
});

dropzone.on("removefile", function(){
    document.querySelector('[name="image"]').value = "";
});