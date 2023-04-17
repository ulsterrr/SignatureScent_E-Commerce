Dropzone.options.singleFileUpload = {
    url: '/admin/chi-tiet-tai-khoan/{!! json_encode($user->id) !!}',
    method: 'PUT',
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads: 3,
    maxFiles: 5,
    addRemoveLinks: true,
    thumbnailMethod: 'crop',
    resizeWidth: 500,
    resizeHeight: 500,
    resizeQuality: 0.3,
    acceptedFiles: ".jpg, .jpeg, .png",
    dictDefaultMessage: "Drop your files here!",

    init: function () {
        var myDropzone = this;
        $('#submitzone').on("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });
        this.on("sending", function(file, xhr, formData){
            $('#singleFileUpload').each(function() {
                title = $(this).find('input[name="title"]').val();
                formData.append('title', title);
            });
        });
        this.on("success", function(file, response) {

        });
        this.on("completemultiple", function(files) {
            // Here goes what you want to do when the upload is done
            // Redirect, reload , load content ......

        });
    },

};
