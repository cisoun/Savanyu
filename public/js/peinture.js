var containere;
var grid;
var popupTemplate;

function closePopup() {
    $('.popup').remove();
    $('#container').removeClass('blurred');
}

function openPopup(element) {
    container.addClass('blurred');
    container.after(popupTemplate.html());
    
    $('.popup-content').addClass('animation');
    $('.popup-image').attr('src', element.currentTarget.children[0].src);
    
    let id = element.currentTarget.dataset.artwork;
    var images = paintings[id].images;

    if (images.length > 1) {
        images.forEach((image) => {
            $('.popup-thumbnails').append(`<img src="${image.path}" />`);
        });
    }
    
    // Prevent popup closing when clicked.
    $('.popup-content').click(function(event) {
        event.stopPropagation();
    })
    
    // Handle popup closing.
    $('.popup-close').on('click', () => {
        closePopup();
    });
}

$(function() {
    console.log( "ready!" );
    
    container = $('#container');
    popupTemplate = $('#popupTemplate');


    var $grid = $('.grid').imagesLoaded( function() {
        // init Masonry after all images have loaded
        $grid.masonry({
            // options...
            gutter: 16
        });
    });
    
    

    const artworksElements = $('[data-artwork]');
    
    artworksElements.on('click', (element) => openPopup(element));

});
