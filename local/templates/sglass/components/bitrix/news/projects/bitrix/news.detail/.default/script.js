$(document).ready(function() {
    $('#more-photo-slider').revolution(
        {
            delay:9000,
            startwidth:1170,
            startheight:550,
            hideThumbs:10,
            forceFullWidth:"off",
            fullWidth:"off",
            navigationStyle:"preview4",
            navigationType:"none",
            stopSlider: "on",
            stopAfterLoops:"0",
            stopAtSlide:"1",
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
