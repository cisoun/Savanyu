export default {
    container: null,
    popup: null,
    
    init() {
        this.container = $('#container');
        this.image = $('.popup-image');
        this.popup = $('#popup');
        this.thumbnails = $('.popup-thumbnails');
                
        // Prevent popup closing when clicked.
        $('.popup-content').click((event) => event.stopPropagation());
        
        // Handle popup closing.
        $('.popup-close').on('click', () => this.close());
    },
    
    close() {
        // Hide popup.
        this.popup.css('display', 'none');
        
        // Remove blur.
        this.container.removeClass('blurred');
    },

    open(images) {
        // Blur background.
        this.container.addClass('blurred');
        
        // Show popup.
        this.popup.css('display', 'block');
        
        // Clear thumbnails.
        this.thumbnails.empty();
        
        // Set new image.
        this.image.attr('src', images[0].path);

        // If artwork has many pictures, add them as thumbnails.
        if (images.length > 1) {
            images.forEach((image, index) => {
                // Add thumbnail.
                this.thumbnails.append(`<img src="${image.path}" />`);
                
                // Switch popup image to hovered picture.
                this.thumbnails.children().last().on('mouseover', (element) => {
                    this.image.attr('src', element.currentTarget.src);
                });

                // New line after 12 thumbnails.
                if ((index + 1) % 12 == 0) {
                    this.thumbnails.append(`<br/>`);
                }
            });
        }
    }
}