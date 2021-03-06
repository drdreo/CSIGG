/**
 * Created by Andreas on 03.12.16.
 */

//Allrounder INFGRAPHIC



//Allrounder CHEATSHEETS
function changeFont(font) {
    console.log(font);
    var element = document.getElementById('filePreview');
    element.style.fontFamily = font;

}

function changeFontColor(colorPicker)
{
    var element = document.getElementById('filePreview');
    var color =  colorPicker.colorpicker('getValue', '#ffffff');

    element.style.setProperty('color', color, 'important');

    $('#dataFontColor').val(color);

}
function changeContainerSize(div) {
    var id = div.attr('id');
    var width, height;

    switch (id) {
        case 'postSize':
            width = height = 76;
            break;
        case 'squareSize':
            width = height = 50;
            break;
        case 'userSize':
            var dimensions = div.val().split("x");
            width = dimensions[0];
            height = dimensions[1];
            break;
        default:
            break;
    }

    var preview = document.getElementById('filePreview');

    preview.style.width = width + "mm";
    preview.style.height = height + "mm";

    $("input[type=hidden]").each(function() {
        var name = $(this).attr("name");
        switch(name)
        {
            case "widthDimension" : $(this).val(width); break;
            case "heightDimension" : $(this).val(height); break;
        }
    });


    formatTextSize(preview);
}

function checkFileLength(element) {
    var fits = true;
    if ((element.offsetHeight < element.scrollHeight) || (element.offsetWidth < element.scrollWidth)) {
        //element has overflow
        $(element).removeClass("shadowSuccess");
        $(element).addClass("shadowError");
        fits = false;
    }
    else {
        $(element).removeClass("shadowError");
        $(element).addClass("shadowSuccess");
        fits = true;
    }

    return fits;
}

function formatTextSize(element) {

    var fontSize = 50; // start font size
    do
    {
        --fontSize;

        element.style.fontSize = fontSize + "px";
    } while (!checkFileLength(element) && fontSize != 2);

    //update hidden input value
    $('#dataFontSize').val(fontSize);
}
function generateCheatSheet() {

    var previewContent = document.getElementById('filePreview');
    var printContent = document.getElementById('filePrintPreview');

    var ignoreCRLFCheckBox = document.getElementById('strictCheckBox').checked;

    if (ignoreCRLFCheckBox) {
        previewContent.innerHTML = removeCRLF(previewContent.innerHTML);
    }

    formatTextSize(previewContent);

    copyFormat(previewContent, printContent);

    window.print();

}


function copyFormat(element1, element2) {

    element2.style.fontSize = element1.style.fontSize;
    element2.style.fontFamily = element1.style.fontFamily;
    element2.style.setProperty('color',element1.style.color,'important');
    element2.style.width = element1.style.width;
    element2.style.height = element1.style.height;
    element2.innerHTML = element1.innerHTML;
}

//Console Output

function out() {
    for (var i = 0; i < arguments.length; i++) {
        console.log("i: " + i + " A: " + arguments[i] + "\n");
    }
}


// CONVERTERS

function removeCRLF(string) {
    return string.replace(/(\r\n|\n|\r)/gm, "");
}

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

    var rgb = [];

    rgb[0] = parseInt(result[1], 16);
    rgb[1] = parseInt(result[2], 16);
    rgb[2] = parseInt(result[3], 16);
    return rgb;
    //return "rgb(" + parseInt(result[1], 16) + ","+parseInt(result[2], 16) + "," + parseInt(result[3], 16) + ")";
}

function generateInfographic() {

    window.print();
}