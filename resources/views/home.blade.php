<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-12">
            <div class="mx-auto flex flex-col items-center justify-center space-y-4">
                <x-jet-application-logo></x-jet-application-logo>
                <h1 class="text-center text-xl font-semibold uppercase text-gray-600 tracking-wider mt-1">Video Challenge</h1>
            </div>
            <article class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 prose prose-lg mx-auto">
                <h2>Willkommen bei der Videochallenge der Musikschule des Rhein-Kreis Neuss</h2>
                <p>
                    Die Idee zu dieser besonderen Aktion wurde Ende des Jahres 2020 geboren, als wir feststellen mussten, dass die Corona-Pandemie uns alle noch länger beschäftigen wird als allen lieb ist.
                </p>
                <p>
                    Während der Musikunterricht dank des Engagements der Lehrkräfte, der Schülerinnen und Schüler, der Eltern und der Leitung der Musikschule schon wenige Tage nach dem ersten Lockdown flächendeckend online stattfinden konnte, fehlen allen die zahlreichen Treffen und Vorspiele in den Instrumentengruppen, die kleinen und größeren Konzerte und Veranstaltungen. Bis wir zur „Normalität“ zurückkehren können, wird es sicher noch einige Zeit dauern.
                </p>
                <p>
                    Mit der Videochallenge erhielten alle Schülerinnen und Schüler die Gelegenheit, ein kleines, selbst produziertes Video auf eine schulinterne Plattform hochzuladen. Die Resonanz war überwältigend. Wir durften uns über mehr als 190 Beiträge aus allen Altersgruppen und Instrumentenklassen freuen. Es waren sehr lustige und sehr originelle Beiträge dabei. Die Kinder und Jugendlichen hatten sichtlich Spaß, sich, Ihre Instrumente und Ihr Können innerhalb der Schule zu präsentieren (und die Beiträge der anderen zu sehen). 20 Gutscheine zu 50,00 Euro, die unter allen Teilnehmenden ausgelost wurden, waren ein zusätzlicher Anreiz.
                </p>
                <p>
                    Aus den ganz unterschiedlichen Videos haben wir diejenigen ausgewählt, die nach unserer Meinung am besten zeigen, in welcher Bandbreite die Musikschule Freude an der Musik vermittelt. Diese Beiträge wurden überwiegend noch einmal mit professioneller Unterstützung aufgenommen und können jetzt in diesem Rahmen gezeigt werden. Es versteht sich von selbst, dass die Beiträge nicht verbreitet oder anderweitig genutzt werden wollen.
                </p>
                <p>
                    Ein ganz herzliches Dankeschön an alle Eltern, Lehrkräfte und Schülerinnen und Schüler, die sich bei diesem Projekt eingesetzt haben. Vor allem aber danken wir den Mitgliedern und Förderern unseres Vereins, die mit ihrem finanziellen Beitrag das ermöglicht haben, was Sie auf dieser Seite entdecken dürfen. Wir wünschen dabei viel Freude!
                </p>
                <p>
                    <b>Ihr Förderverein der Musikschule des Rhein-Kreis Neuss</b>
                </p>
                <p class="text-base">
                    P.S.: Wenn Sie uns unterstützen oder sich im Förderverein engagieren wollen, <a href="https://www.rhein-kreis-neuss.de/de/freizeit-kultur/musikschule/foerderverein/" target="_blank" rel="noreferrer noopener">finden Sie hier alle Informationen</a>.
                </p>
            </article>
        </div>
        @livewire('public-videos')
    </div>
    <livewire:video-player />
</x-guest-layout>
