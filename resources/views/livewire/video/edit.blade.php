<div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md">
    <form action="{{ route('dashboard-own-video', ['id' => $video->id]) }}" method="post">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div class="row-span-2">
                @livewire('video.player', ['video' => $video])
            </div>
            <div>
                <label class="text-gray-700" for="title">Titel</label>
                <input id="title" name="title" type="text" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{ $video->name }}" required>
            </div>

            <div>
                <label class="text-gray-700" for="text">Beschreibung</label>
                <textarea id="text" name="text" class="w-full mt-2 px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline" rows="10" required>{{ trim($video->description) }}</textarea>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="btn btn-submit">Speichern</button>
            <a href="{{ route('dashboard-own-video') }}" class="btn btn-default ml-2">Abbrechen</a>
        </div>
    </form>
</div>
