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
                        let publicId = encodeURIComponent(result.info.public_id.replace('/', '-'));
                        let originalFilename = encodeURIComponent(result.info.original_filename);
                        window.location.href = '{{ route('dashboard-create-video', [':id', ':filename']) }}'.replace(':id', publicId).replace(':filename', originalFilename);
                    }
                    console.log(error, result)
                })
            }
        }
    }
</script>

<section x-data="upload()" x-init="init()">
    <x-jet-button @click="uploadWidget.open()" x-bind:disabled="!uploadWidget">Neues Video hochladen</x-jet-button>
</section>

@if ($videos->isEmpty())
    <x-jet-banner style="danger" message="Leider hast Du noch keine Videos hochgeladen"/>
    <div class="h-96 flex flex-col justify-center items-center mx-6">
        <div class="border border-gray-300 shadow-md rounded-lg p-4 container max-w-screen-lg">
            <div class="flex space-x-4">
                <div class="rounded-full bg-gray-300 h-12 w-12"></div>
                <div class="flex-1 space-y-4 py-1">
                    <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    <div class="space-y-2">
                        <div class="h-4 bg-gray-300 rounded"></div>
                        <div class="h-4 bg-gray-300 rounded w-5/6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="grid grid-cols-1 gap-6 container mx-auto my-12">
        @foreach($videos as /* @var App\Models\Video $video */ $video)
            <div class="bg-white overflow-hidden shadow-md rounded-lg">
                <div class="flex flex-row items-center">
                    <img class="w-64 h-32 object-cover" src="{{ $video->thumbnail()->toUrl() }}" alt="Video">
                    <div class="p-6 flex-grow">
                        <h1 class="block text-gray-800 font-semibold text-2xl mt-2">{{ $video->name }}</h1>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <span class="mx-1 text-gray-600 text-xs">{{ $video->created_at->format('d.m.Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 flex-shrink-0">
                        <a href="{{ route('dashboard-own-video', ['id' => $video->id]) }}" class="btn btn-submit">Bearbeiten</a>
                        <button class="btn btn-default ml-2 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
