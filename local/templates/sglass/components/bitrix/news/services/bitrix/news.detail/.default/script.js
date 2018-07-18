$(document).ready(function() {
    // revolution
    $('#more-photo-slider').revolution(
        {
            navigationStyle:"preview4",
            navigationType:"none"
        });
    // Magnific Popup core
    $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
                verticalFit: true,
                titleSrc: function(item) {
                        //return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                        return false;
                        }
                },
        gallery: {
                enabled: true
        },
        zoom: {
                enabled: true,
                duration: 500,
                opener: function(element) {
                        return element.find('img');
                }
              }

    });
});
