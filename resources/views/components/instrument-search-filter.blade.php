<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option value="">{{ __('All Instruments') }}</option>
    @foreach(\App\Models\MusicalInstrument::all()->sortBy('name') as $instrument)
        <option value="{{ $instrument->id }}" @isset ($value) @if ($instrument->id == $value) selected @endif @endif>{{ $instrument->name }}</option>
    @endforeach
</select>
