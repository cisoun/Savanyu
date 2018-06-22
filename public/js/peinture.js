var container;
var grid;
var popupTemplate;

function closePopup() {
    $('.popup').remove();
    container.removeClass('blurred');
}

function openPopup(element) {
    container.addClass('blurred');
    container.after(popupTemplate.html());
    
    $('.popup-content').addClass('animation');
    $('.popup-image').attr('src', element.currentTarget.children[0].src);
    
    const id = element.currentTarget.dataset.artwork;
    const images = paintings[id].images;

    // If artwork has many pictures, add them as thumbnails.
    if (images.length > 1) {
        images.forEach((image, index) => {
            // Add thumbnail.
            $('.popup-thumbnails').append(`<img src="${image.path}" />`);
            
            // Switch popup image to hovered picture.
            $('.popup-thumbnails').children().last().on('mouseover', (element) => {
                $('.popup-image').attr('src', element.currentTarget.src);
            });

            // New line after 12 thumbnails.
            if ((index + 1) % 12 == 0) {
                $('.popup-thumbnails').append(`<br/>`);
            }
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
    console.log("ready !");
    
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
