<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option value="">{{ __('All Ages') }}</option>
    <option value="to6">{{ __('6 and younger') }}</option>
    @for($i = 7; $i < 20; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
    <option value="from20">{{ __('20 and older') }}</option>
</select>
