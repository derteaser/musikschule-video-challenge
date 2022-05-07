<div>
    <script type="text/javascript">
        function upload() {
            return {
                uploadWidget: null,
                buttonVisible: false,
                placeholderVisible: true,
                init: function() {
                    this.uploadWidget = cloudinary.openUploadWidget({
                        cloudName: @json(Str::after(config('cloudinary.cloud_url'),'@')),
                        multiple: false,
                        sources: ['local'],
                        uploadPreset: @json(config('cloudinary.upload_preset')),
                        clientAllowedFormats: ["mp4","mov","avi"],
                        maxFileSize: 55000000,
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
                            this.placeholderVisible = true;
                            this.buttonVisible = false;
                            @this.createVideo(result.info.public_id, result.info.original_filename);
                        } else if (result.event === "display-changed") {
                            switch (result.info) {
                                case "shown":
                                case "expanded":
                                    this.buttonVisible = false;
                                    this.placeholderVisible = false;
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

    <section x-data="upload()" x-init="init()" class="w-full">
        <div class="bg-yellow-500 text-white px-4 py-2 rounded-lg w-full inline-flex items-center" x-show="placeholderVisible === true">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ __('Please wait a moment...') }}
        </div>
        <x-jet-button @click="uploadWidget.open();" class="mx-auto" x-show="buttonVisible === true && placeholderVisible === false" style="display: none;">{{ __('Create new Video') }}</x-jet-button>
    </section>
</div>
