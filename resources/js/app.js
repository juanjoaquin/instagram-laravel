import Dropzone from "dropzone"

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, . gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('sending', function(file, xhr, formData) {
    console.log('Enviando archivo...', file);
});

dropzone.on('success', function(file, response) {
    console.log("Respuesta del servidor:", response); // Debería mostrar el nombre generado por el servidor
    document.querySelector('input[name="imagen"]').value = response.imagen;
});



dropzone.on('removedFile', function(file) {
    document.querySelector("[name='imagen']").value = "";
});