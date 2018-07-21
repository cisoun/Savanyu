import { App } from './app.js';

var $grid = $('.grid').imagesLoaded(function() {
    // Init Masonry after all images have loaded.
    $grid.masonry({
        // options...
        gutter: 16
    });
});

// Call popup on each element in the grid.
$('[data-artwork]').on('click', (element) => {
    const id = element.currentTarget.dataset.artwork;
    const images = paintings[id].images;
    
    App.popup.open(images);
});
