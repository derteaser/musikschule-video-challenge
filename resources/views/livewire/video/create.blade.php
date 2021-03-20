<script type="text/javascript">
    function upload() {
        return {
            uploadWidget: null,
            init: function() {
                this.uploadWidget = cloudinary.createUploadWidget({
                    cloudName: '{{ Str::after(config('cloudinary.cloud_url'),'@') }}',
                    multiple: false,
                    sources: ['local', 'camera', 'dropbox'],
                    uploadPreset: '{{ config('cloudinary.upload_preset') }}',
                }, (error, result) => {
                    if (result.event === "success") {
                        const publicId = result.info.public_id;
                        const originalFilename = result.info.original_filename;
                        window.location.href = '/add/?cloudinary_public_id=' + publicId + '&original_filename=' + encodeURI(originalFilename);
                    }
                    console.log(error, result)
                })
            }
        }
    }
</script>
<button @click="uploadWidget.open()" x-bind:disabled="!uploadWidget" class="bg-gray-900 text-gray-100 px-5 py-3 font-semibold rounded hover:bg-gray-800">Jetzt loslegen</button>
