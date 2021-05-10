(function($){
    $(document).ready(function() {
        $('.menu a').click(function(e) {
            e.preventDefault();
            let thisAnchor = $(this).attr('href');
            thisAnchor = thisAnchor.substring(1);
            console.log(thisAnchor);
            scrollToAnchor(thisAnchor);
        });
    })

    function scrollToAnchor(aid){
        var aTag = $("a[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }

}(jQuery));
