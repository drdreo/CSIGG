/**
 * Created by Andreas on 03.12.16.
 */

function changeFont(font) {
    console.log(font);
    var element = document.getElementById('filePreview');
    element.style.fontFamily = font;
    var element2 = document.getElementById('filePrintPreview');
    element2.style.fontFamily = font;
}
