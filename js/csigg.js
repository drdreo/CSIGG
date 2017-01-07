/**
 * Created by Andreas on 03.12.16.
 */

function changeFont(font) {
    console.log(font);
    var element = document.getElementById('filePreview');
    element.style.fontFamily = font;

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


    formatTextSize(preview);
}
function checkFileLength(element) {
    var fits = true;
    if ((element.offsetHeight < element.scrollHeight) || (element.offsetWidth < element.scrollWidth)) {
        //element has overflow
        element.style.border = "thick solid #FF0000";
        fits = false;
    }
    else {
        element.style.border = "thick solid #00FF00";
        fits = true;
    }

    return fits;
}

function formatTextSize(element) {

    var fontSize = 50;
    do
    {
        --fontSize;

        element.style.fontSize = fontSize + "px";
    } while (!checkFileLength(element) && fontSize != 2);

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
    element2.style.color = element1.style.color;
    element2.style.width = element1.style.width;
    element2.style.height = element1.style.height;
    element2.innerHTML = element1.innerHTML;
}

//Output

function out() {
    for (var i = 0; i < arguments.length; i++) {
        console.log("i: " + i + " A: " + arguments[i] + "\n");
    }
}
// CONVERTERS

function removeCRLF(string) {
    return string.replace(/(\r\n|\n|\r)/gm, "");
}