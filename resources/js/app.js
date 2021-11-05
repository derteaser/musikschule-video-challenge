require('./bootstrap');

require('alpinejs');

import BigPicture from 'bigpicture'

(function () {
    const imageLinks = document.querySelectorAll('#publicVideos a');
    for (let i = 0; i < imageLinks.length; i++) {
        imageLinks[i].addEventListener('click', function (e) {
            e.preventDefault()
            BigPicture({
                el: e.currentTarget,
                iframeSrc: e.currentTarget.getAttribute('href'),
                dimensions: [800, 450],
            })
        })
    }
})()
