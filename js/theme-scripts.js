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

        $('.wp-block-latest-posts a').click(function(e) {
            e.preventDefault();
        });

        $('.wp-block-button__ajax-load').click(function(e) {
            e.preventDefault();
            /* don't load category template */
            let appendToElement = $(this).closest('.wp-block-buttons').siblings('.wp-block-latest-posts');
            /* match element to append new posts */
            let loadCatPosts = $(this).find('a').attr('href');
            let settings = {
              "url": "https://stage.presspro.dev/ecicorp/wp-json/wp/v2/posts?categories=" + loadCatPosts + "&offset=3&orderby=date&order=asc",
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
        let emptyHTMLString = '---';
        if(postsData.length > 0) {
            for (i = 0; i < postsData.length; i++) {
                let settings = {
                  "url": "https://stage.presspro.dev/ecicorp/wp-json/wp/v2/media/" + postsData[i].featured_media,
                  "method": "GET",
                  "timeout": 0,
                };
                $.ajax(settings).done(function (response) {
                    $('.wp-block-latest-posts_ajax-' + response.id + ' .wp-block-latest-posts__featured-image img').attr('src',response.source_url);
                });

                newHTMLString += '<li class="wp-block-latest-posts_ajax-'+postsData[i].featured_media+'"><div class="wp-block-latest-posts__featured-image"><img src="https://stage.presspro.dev/ecicorp/wp-content/themes/presspro-original-theme/img/preloader-small.svg" class="attachment-medium size-medium wp-post-image"></div><a href="'+postsData[i].link+'">'+postsData[i].title.rendered+'</a><div class="wp-block-latest-posts__post-full-content">'+postsData[i].content.rendered+'</div></li>';
            }
        }
        else {
            newHTMLString += '<li class="wp-block-latest-posts__ajax-end">' + emptyHTMLString + '</li>';
        }
        $(appendToElement).append(newHTMLString);

        $('.wp-block-latest-posts a').click(function(e) {
            e.preventDefault();
        });
    }

}(jQuery));
