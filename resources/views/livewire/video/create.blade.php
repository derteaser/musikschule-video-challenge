<script type="text/javascript">
    function upload() {
        return {
            uploadWidget: null,
            init: function() {
                this.uploadWidget = cloudinary.createUploadWidget({
                    cloudName: @json(Str::after(config('cloudinary.cloud_url'),'@')),
                    multiple: false,
                    sources: ['local', 'camera', 'dropbox'],
                    uploadPreset: @json(config('cloudinary.upload_preset')),
                }, (error, result) => {
                    if (result.event === "success") {
                        @this.createVideo(result.info.public_id, result.info.original_filename);
                    }
                    console.log(error, result)
                })
            }
        }
    }
</script>

<section x-data="upload()" x-init="init()">
    <x-jet-button @click="uploadWidget.open()" x-bind:disabled="!uploadWidget">{{ __('Create new Video') }}</x-jet-button>
</section>
