<script type="text/javascript">
    function upload() {
        return {
            uploadWidget: null,
            buttonVisible: true,
            init: function() {
                this.uploadWidget = cloudinary.openUploadWidget({
                    cloudName: @json(Str::after(config('cloudinary.cloud_url'),'@')),
                    multiple: false,
                    sources: ['local'],
                    uploadPreset: @json(config('cloudinary.upload_preset')),
                    clientAllowedFormats: ["mp4","mov","avi"],
                    styles: {
                        palette: {
                            window: "#ffffff",
                            sourceBg: "#F3F4F6",
                            windowBorder: "#90a0b3",
                            tabIcon: "#000000",
                            inactiveTabIcon: "#555a5f",
                            menuIcons: "#555a5f",
                            link: "#F07D00",
                            action: "#339933",
                            inProgress: "#F07D00",
                            complete: "#339933",
                            error: "#cc0000",
                            textDark: "#000000",
                            textLight: "#fcfffd"
                        },
                    },
                    language: "de",
                    text: {
                        "de": {
                            or: "Oder",
                            back: "Zurück",
                            close: "Schließen",
                            menu: {
                                files: "Meine Dateien"
                            },
                            notifications: {
                                general_error: "Ein Fehler ist aufgetreten.",
                            },
                            uploader: {
                                errors: {
                                    file_too_large: "Dateigröße (@{{size}}) überschreitet das erlaubte Maximum (@{{allowed}})",
                                    allowed_formats: "Dateiformat nicht erlaubt",
                                    max_file_size: "Datei ist zu groß",
                                    min_file_size: "Datei ist zu klein"
                                }
                            },
                            local: {
                                browse: "Video suchen",
                                dd_title_single: "Video hierhin ziehen um es hochzuladen",
                                drop_title_single: "Video ablegen um es hochzuladen",
                            },
                        }
                    }
                }, (error, result) => {
                    if (result.event === "success") {
                        @this.createVideo(result.info.public_id, result.info.original_filename);
                    }
                    if (result.event === "display-changed") {
                        switch (result.info) {
                            case "shown":
                            case "expanded":
                                this.buttonVisible = false;
                                break;
                            default:
                                this.buttonVisible = true;
                                break;
                        }
                    }
                    if (result.event === "close") {
                        this.buttonVisible = true;
                    }
                    console.log(error, result)
                })
            }
        }
    }
</script>

<section x-data="upload()" x-init="init()">
    <x-jet-button @click="uploadWidget.open();" x-show="buttonVisible === true" x-cloak>{{ __('Create new Video') }}</x-jet-button>
</section>
