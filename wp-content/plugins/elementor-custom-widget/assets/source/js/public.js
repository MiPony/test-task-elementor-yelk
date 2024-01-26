;(function($) {
    "use strict";

    // Team Carousel

    let teamCarousel = function( $scope, $ ) {
        let $_this = $scope.find( '.team-carousel' )
        if($scope.find( '.team-carousel' ).length == 1){
            let $currentID = '#'+$_this.attr( 'id' ),
                $desktop   = $_this.data( 'desktop' ),
                $tablet    = $_this.data( 'tablet' ),
                $mobile    = $_this.data( 'mobile' ),
                $loop      = $_this.data( 'loop' ),
                $dots      = $_this.data( 'dots' ),
                $navs      = $_this.data( 'navs' ),
                $margin    = $_this.data( 'margin' );

            let owl = $( $currentID );
            owl.owlCarousel({
                loop: $loop,
                margin: $margin,
                nav: $navs,
                dots: $dots,
                responsive:{
                    0:{
                        items: $mobile
                    },
                    600:{
                        items: $tablet
                    },
                    1000:{
                        items: $desktop
                    }
                }
            })
        } else {
            let $_this   = $scope.find( '.lists-our-team' );
            let $item    = document.querySelectorAll('.item'),
                $desktop = $_this.data( 'desktop' ),
                $tablet  = $_this.data( 'tablet' ),
                $mobile  = $_this.data( 'mobile' );

            function reportWindowSize() {
                $($item).each(function( e ) {
                    if(window.matchMedia("screen and (max-width: 600px)").matches==true){
                        $item[e].style.width = 100/$mobile + '%'
                    }
                    if(window.matchMedia("screen and (max-width: 999px) and (min-width: 601px)").matches==true){
                        $item[e].style.width = 100/$tablet + '%'
                    }
                    if(window.matchMedia("screen and (min-width: 1000px)").matches==true){
                        $item[e].style.width = 100/$desktop + '%'
                    }
                });
            }
            window.onresize = reportWindowSize;
        }
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/myewpricing-team-carousel-id.default', teamCarousel);
    });
})(jQuery);