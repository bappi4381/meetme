jQuery(document).ready(function () {
    "use strict"
    // $("body").scrollTop( 200 );
    // let selectedSection;
    // $(".menu-area-inner ul li").on("click", function (e) {
    //     e.preventDefault();
    //     selectedSection = $(this).children("a").attr("href").replace("#", "")
    //     let currentActive = $(".menu-area-inner ul li.active").children("a").attr("href").replace("#", "");
    //     $(this).addClass("active");
    //     $(this).siblings().removeClass("active");
    //
    //     if (selectedSection !== currentActive) {
    //         $(".page-container section").removeClass("active-section");
    //         $(".page-container").find("#" + selectedSection).addClass("active-section");
    //         $("body.mobile-view-activated .menu-area").slideUp();
    //         $("body.mobile-view-activated  .copyright").slideUp();
    //     }
    //
    //     if (selectedSection === "portfolio") {
    //         setTimeout(function () {
    //             $('.portfolio-wrapper').masonry({
    //                 itemSelector: '.portfolio-item',
    //                 gutter: 30,
    //                 percentPosition: true
    //             })
    //         }, 1000)
    //     }
    //
    //     scrollUpMobileContent();
    // })
    //
 
    function scrollUpMobileContent() {
        if($(window).innerWidth() < 767){
            jQuery('html, body').animate({scrollTop: ($('.sidebar').innerHeight() + 145)}, 100);
        }
    }

    //Masonry
    $('.portfolio-wrapper').masonry({
        itemSelector: '.portfolio-item',
        gutter: 30,
        percentPosition: true
    })
    //Mobile menu
    $(".mobile-menu-trigger button").on("click", function () {
        $(".menu-area").slideToggle();
        $(".copyright").slideToggle();
        $(this).toggleClass("mobile-menu-activated")
    })
    let browserWidth = $(window).innerWidth();

    if (browserWidth < 1000) {
        $("body").addClass("mobile-view-activated");
    } else {
        $("body").removeClass("mobile-view-activated");
    }

    $(window).resize(function () {
        browserWidth = $(window).innerWidth();
        if (browserWidth < 1000) {
            $("body").addClass("mobile-view-activated");
        } else {
            $("body").removeClass("mobile-view-activated");
            $("body .menu-area").slideDown();
            $("body  .copyright").slideDown();
        }
        // console.log(browserWidth)
    })

    //Portfolio PopUp
    $('.btn-details').on('click', function () {
        const projectContent = $(this).parents(".portfolio-item-inner").html();

        console.log(projectContent);

        $('body').addClass("project-popup-activated");
        $('.project-popup-content').html(projectContent);
    })
    $('.close-project-popup').on('click', function () {
        $('body').removeClass("project-popup-activated");
    })
});
