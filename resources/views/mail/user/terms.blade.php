@component('mail::message')
# Sende uns Deine Teilnahmeerklärung für die Videochallenge!

Hallo {{ $user->name }},

bitte denk daran, dass die Freischaltung für den Upload der Videos nur möglich ist, wenn die Teilnahmeerklärung an [videochallenge@foev-musikschule.de](mailto:videochallenge@foev-musikschule.de) geschickt wurde. Falls Du das noch nicht gemacht hast, sprich bitte mit Deinen Eltern.

@component('mail::button', ['url' => $url, 'color' => 'primary'])
    Teilnahmeerklärung herunterladen
@endcomponent

Hast Du Fragen oder Anregungen? Dann schreib einfach an [videochallenge@foev-musikschule.de](mailto:videochallenge@foev-musikschule.de).

Viele Grüße,<br>
{{ config('app.name') }}
@endcomponent
