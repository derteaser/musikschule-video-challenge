<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option>{{ __('Please select your instrument') }}</option>
    @foreach(\App\Models\MusicalInstrument::all()->sortBy('name') as $instrument)
        <option value="{{ $instrument->id }}">{{ $instrument->name }}</option>
    @endforeach
</select>