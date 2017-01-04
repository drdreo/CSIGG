/**
 * Created by Andreas on 03.12.16.
 */

function changeFont(font) {
    console.log(font);
    var element = document.getElementById('filePreview');
    element.style.fontFamily = font;
    // var element2 = document.getElementById('filePrintPreview');
    // element2.style.fontFamily = font;
    //
    // formatTextSize(element);
}

function changeContainerSize(div)
{
    console.log(div);
}
function checkFileLength(element) {
    var fits = true;
    if ((element.offsetHeight < element.scrollHeight) || (element.offsetWidth < element.scrollWidth)) {
        //element has overflow
        element.style.background = "red";
        fits = false;
    }
    else {
        element.style.background = "green";
        fits = true;
    }

    return fits;
}

function formatTextSize(element) {

    var fontSize = 100;
    do
    {
        fontSize -= 2;
        if(fontSize==0) fontSize =2;

        element.style.fontSize = fontSize +"px";
    }while (!checkFileLength(element));

}
function generateCheatSheet() {

    var previewContent = document.getElementById('filePreview');
    var printContent = document.getElementById('filePrintPreview');

    var ignoreCRLFCheckBox = document.getElementById('strictCheckBox').checked;

    if(ignoreCRLFCheckBox)
    {
        previewContent.innerHTML = removeCRLF(previewContent.innerHTML);
    }

    formatTextSize(previewContent);

    copyFormat(previewContent,printContent);

    window.print();

}



function copyFormat(element1,element2)
{

    element2.style.fontSize = element1.style.fontSize;
    element2.style.fontFamily = element1.style.fontFamily;
    element2.style.color = element1.style.color;
    element2.innerHTML = element1.innerHTML;
}


// CONVERTERS

function removeCRLF(string)
{
    return string.replace(/(\r\n|\n|\r)/gm,"");
}