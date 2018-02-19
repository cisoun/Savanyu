$(function() {
    console.log( "ready!" );

    var $grid = $('.grid').imagesLoaded( function() {
        // init Masonry after all images have loaded
        $grid.masonry({
            // options...
            gutter: 16
        });
    });
});
