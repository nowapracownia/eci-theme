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

        $('.wp-block-button__ajax-load').click(function(e) {
            e.preventDefault();
            /* don't load category template */
            let appendToElement = $(this).closest('.wp-block-buttons').siblings('.wp-block-latest-posts');
            /* match element to append new posts */
            let loadCatPosts = $(this).find('a').attr('href');
            let settings = {
              "url": "http://localhost/localwww/ecicorp.pl/wp-json/wp/v2/posts?categories=" + loadCatPosts,
              "method": "GET",
              "timeout": 0,
            };
            /* get posts via REST API */
            $.ajax(settings).done(function (response) {
                createHTML(response,appendToElement);
                /* render output and append it to proper element */
            }).fail(function() {
                console.log('REST API get posts error');
            });
            $(this).fadeOut();
            /* then remove button */
        });

    });
    function scrollToAnchor(aid){
        var aTag = $("a[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }
    function createHTML(postsData,appendToElement) {
        let newHTMLString = '';
        let newHTMLFeatured = '';
        for (i = 0; i < postsData.length; i++) {
            let settings = {
              "url": "http://localhost/localwww/ecicorp.pl/wp-json/wp/v2/media/" + postsData[i].featured_media,
              "method": "GET",
              "timeout": 0,
            };
            $.ajax(settings).done(function (response) {
                newHTMLFeatured = '<div class="wp-block-latest-posts__featured-image"><img src="'+response.source_url+'" class="attachment-medium size-medium wp-post-image"></div>';
                $('.wp-block-latest-posts_ajax-' + response.id).prepend(newHTMLFeatured);
            });

            newHTMLString += '<li class="wp-block-latest-posts_ajax-'+postsData[i].featured_media+'"><a href="'+postsData[i].link+'">'+postsData[i].title.rendered+'</a><div class="wp-block-latest-posts__post-full-content">'+postsData[i].content.rendered+'</div></li>';
        }
        $(appendToElement).append(newHTMLString);
    }

}(jQuery));
