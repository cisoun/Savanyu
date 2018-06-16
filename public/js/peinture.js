$(function() {
    console.log( "ready!" );

    var $grid = $('.grid').imagesLoaded( function() {
        // init Masonry after all images have loaded
        $grid.masonry({
            // options...
            gutter: 16
        });
    });
    
    var popupTemplate = $('template');
    
    var artworks = $('[data-artwork]');
    artworks.on('click', (element) => {
        $('#container').addClass('blurred');
        $('#container').after(popupTemplate.html());
        
        $('.popup-content').addClass('animation');
        
        
        console.log(element.currentTarget.children[0].src);
        
        $('.popup-image').attr('src', element.currentTarget.children[0].src);
        
        $('.popup-close').on('click', (element) => {
            $('.popup').remove();
            $('#container').removeClass('blurred');
        });
    });
});
