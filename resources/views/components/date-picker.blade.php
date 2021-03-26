<div wire:ignore x-data="{ pikaday: null }" x-init="pikaday = new Pikaday({
    field: $refs.input,
    trigger: $refs.button,
    firstDay: 1,
    maxDate: moment().subtract(5, 'years').toDate(),
    minDate: moment().subtract(80, 'years').toDate(),
    yearRange: 20,
    i18n: {
        previousMonth : 'Vorheriger Monat',
        nextMonth     : 'Nächster Monat',
        months        : ['Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'],
        weekdays      : ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
        weekdaysShort : ['So','Mo','Di','Mi','Do','Fr','Sa']
    },
    onSelect: function() { $refs.output.innerHTML = this.getMoment().format('DD.MM.YYYY'); }
}); $refs.output.innerHTML = pikaday.getMoment().format('DD.MM.YYYY');">
    <input type="hidden" x-ref="input" onchange="this.dispatchEvent(new InputEvent('input'))" {{ $attributes }}>
    <div class="flex flex-row justify-between rounded bg-gray-100 ">
        <div x-ref="output" class="p-3"></div>
        <x-jet-button type="button" x-ref="button">Datum wählen</x-jet-button>
    </div>
</div>
