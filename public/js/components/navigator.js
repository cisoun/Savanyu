export default {
    init() {
        $('.arrow').on('click', (element) => {
            var reversed = element.target.classList.contains('arrow-reverse');
            var child = $('.scrollable-inner').children();
            
            $('.scrollable-inner').scrollTop(reversed ? child.height() : 0);
        });
    }
}