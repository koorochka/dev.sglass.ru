$(document).ready(function() {
    $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
                verticalFit: true,
                titleSrc: function(item) {
                        return item.el.find("h4").text() + '<small>' + item.el.data("description") + '</small>';
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
