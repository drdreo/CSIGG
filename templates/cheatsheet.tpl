{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}

<div class="content-wrapper" style="min-height: 600px; background-color: white;">
    <div class="col-md-12 box no-border">
        <div class="box-header hidden-print">
            <h3>CheatSheet Generator</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6 border-right">
                {*DropZone*}
                <div class="col-md-12 hidden-print">
                    <h3>DropZone</h3>
                    <form action="{$smarty.server.SCRIPT_NAME}" class="dropzone" id="my-dropzone"
                          enctype="multipart/form-data">
                        <div class="fallback">
                            <input name="file" type="file" id="file"/>

                        </div>
                    </form>
                </div>
                {*Text Upload Preview*}
                <div class="col-md-12 hidden-print">
                    <h3 class="pull-left">Preview</h3>
                    <button class="btn btn-flat btn-primary btn-sm pull-right" style="margin-top:15px;"
                            onclick="generateCheatSheet(); return false;">Generate
                    </button>
                    <div class="box no-border shadow" id="filePreview2"
                         style="min-height:100px; max-height: 350px; overflow: scroll;">

                        {*Printed CheatSheet*}

                            <div class="box no-border shadow" id="filePreview"
                                 style="position:static; padding: 2px; width:287.244094488px; height: 287.244094488px; word-wrap: break-word; overflow-wrap: break-word; white-space: pre-line;">
                            </div>

                    </div>
                </div>
            </div>
            {*Printed CheatSheet*}
            <div class="col-md-12 visible-print">
                <h3 style="color: #12FF12">CheatSheet</h3>
                <div class="box no-border shadow" id="filePrintPreview"
                     style="padding: 2px; width:287.244094488px; height: 287.244094488px; word-wrap: break-word; overflow-wrap: break-word; white-space: pre-line;">
                </div>
            </div>
            <div class="col-md-6 hidden-print">
                {*Size picker*}
                <div class="col-md-12">
                    <h4 style="color:#00a65a;">Size <i class="fa fa-expand "></i></h4>
                    <div class="col-md-12" style="z-index:9999;">
                        <div class="col-md-3 col-xs-4 shadow" id="postSize"
                             onclick="$('.sizeSelector').removeClass('sizeSelector');$(this).toggleClass('sizeSelector'); changeContainerSize($(this));">
                            <span><b>Post It</b><br><small>76mm x 76mm</small></span>
                        </div>
                        <div class="col-md-3 col-xs-4 shadow" id="squareSize"
                             onclick="$('.sizeSelector').removeClass('sizeSelector');$(this).toggleClass('sizeSelector');changeContainerSize($(this));">
                            <span><b>Square</b><br><small>50mm x 50mm</small></span>
                        </div>
                        <div class="col-md-6 col-xs-4 shadow" id="userSize"
                             onclick="$('.sizeSelector').removeClass('sizeSelector');$(this).toggleClass('sizeSelector');"
                             style="padding:5px;"><input class="form-control input-sm"
                                                         type="text"
                                                         placeholder="Enter dimensions"/></div>
                    </div>
                </div>
                {*Color Picker*}
                <div class="col-md-12">
                    <h4 style="color:#00a65a;">Color <i class="fa fa-eyedropper "></i></h4>
                    <div class="col-md-12">
                        <div id="colorpicker" class="input-group col-md-6 shadow" style="padding:5px;">
                            <input type="text" value="#00AABB" class="form-control"/>
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </div>
                </div>
                {*Font picker*}
                <div class="col-md-12">
                    <h4 style="color:#00a65a;">Font <i class="fa fa-font "></i></h4>
                    <div class="col-md-12">
                        <div class="col-md-6 shadow" style="padding:5px;">
                            <select class="form-control" onchange="changeFont($(this).val())">
                                <option value="Arial">Arial</option>
                                <option value="Calibri">Calibri</option>
                                <option value="Helvetica">Helvetica</option>
                                <option value="Comic Sans MS">Comic Sans</option>
                                <option value="Verdana">Verdana</option>
                            </select>
                        </div>
                    </div>
                </div>
                {*Strict Checkbox*}
                <div class="col-md-12">
                    <h4 style="color:#00a65a;">Ignore CR/LF <i class="fa fa-cross "></i></h4>
                    <div class="col-md-12">
                        <div class="col-md-1 shadow" style="padding:5px;">
                            <input id="strictCheckBox" type="checkbox" class="control-form"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>

    $(document).ready(function () {
//        Init the colorpicker input
        $('#colorpicker').colorpicker();

        $('#colorpicker').colorpicker().on('changeColor', function () {
            var element = document.getElementById('filePreview');
            element.style.color = $(this).colorpicker('getValue', '#ffffff');
            var element2 = document.getElementById('filePrintPreview');
            element2.style.color = $(this).colorpicker('getValue', '#ffffff');
        });


//        Init the dropzone
        Dropzone.autoDiscover = false;
        Dropzone.keepLocal = true;
        var $myDropzone = $("#my-dropzone");
        $myDropzone.dropzone({
            dictDefaultMessage: "Drag and Drop CheatSheets <br> -OR- <br> Click here",
            maxFiles: 1,
            dictMaxFilesExceeded: "You may only upload 1 file.",
            maxFilesize: 5,
            acceptedFiles: ".txt,.doc,.xml,.odt",
            dictInvalidFileType: "Only TXT Files supported yet.",
            addRemoveLinks: true,
            init: function () {
                //on successfull File upload
                this.on('success', function (file, resp) {
                    console.log(file);

                    //Retrieve the first (and only!) File from the FileList object
                    var f = file;

                    if (f) {
                        var reader = new FileReader();
                        reader.onload = function (e) {

                            var contents = reader.result;

                            console.log(contents);

                            var filePreview = document.getElementById('filePreview');
                            filePreview.innerHTML = contents;

                            var filePrintPreview = document.getElementById('filePrintPreview');
                            filePrintPreview.innerHTML = contents;

                            formatTextSize(filePreview);
                            formatTextSize(filePrintPreview);
                        };
                        reader.readAsText(f);
                    } else {
                        alert("Failed to load file");
                    }
                });
                //Remove File from List Event
                this.on("removedfile", function (file) {
                    $('#filePreview').html("");
                });


            }


        });
    });


</script>
<!-- /.content-wrapper -->
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}