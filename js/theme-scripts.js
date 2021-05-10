(function($){
    $(document).ready(function() {
        $('.menu a').click(function(e) {
            e.preventDefault();
            let thisAnchor = $(this).attr('href');
            thisAnchor = thisAnchor.substring(1);
            console.log(thisAnchor);
            scrollToAnchor(thisAnchor);
        });
        $(window).scroll(function() {
            let fixedCheck = $('.site-header').hasClass('menu-fixed');
            let scroll = $(window).scrollTop();
            if(scroll > 200) {
                if(!fixedCheck) {
                    $('.site-header').addClass('menu-fixed');
                }
            }
            else {
                if(fixedCheck) {
                    $('.site-header').removeClass('menu-fixed');
                }
            }
        });
    });
    function scrollToAnchor(aid){
        var aTag = $("a[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }

}(jQuery));
