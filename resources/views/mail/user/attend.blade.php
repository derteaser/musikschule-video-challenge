@component('mail::message')
# Teilnahme bestätigt

Hallo {{ $user->name }},

vielen Dank für Deine Anmeldung zur Videochallenge. Wir haben nun auch Deine Teilnahmeerklärung erhalten. Damit ist alles bereit damit Du an der Challenge teilnehmen kannst.

In der Zeit vom __24.04. bis zum 08.05.__ hast Du nun die Möglichkeit, Dein Video hochzuladen. Wir sind schon sehr gespannt.

@component('mail::button', ['url' => $url])
Zur Videochallenge
@endcomponent

Hast Du Fragen oder Anregungen? Dann schreib einfach an [videochallenge@foev-musikschule.de](mailto:videochallenge@foev-musikschule.de).

Viel Spaß beim Üben Deines Lieblingsstücks,<br>
{{ config('app.name') }}
@endcomponent
