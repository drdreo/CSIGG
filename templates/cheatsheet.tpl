{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}
<div class="content-wrapper" style="min-height: 600px; background-color: white;">
    <div class="col-md-12 box no-border">
        <div class="box-header">
            <h3>CheatSheet Generator</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6 border-right">
                {*DropZone*}
                <div class="col-md-12">
                    <h3>DropZone</h3>
                    <form action="{$smarty.server.SCRIPT_NAME}" class="dropzone" id="my-dropzone"
                          enctype="multipart/form-data">
                        <div class="fallback">
                            <input name="file" type="file" id="file"/>

                        </div>
                    </form>
                </div>
                {*Text Upload Preview*}
                <div class="col-md-12">
                    <h3 class="pull-left">Preview</h3>
                    <button class="btn btn-flat btn-primary btn-sm pull-right" style="margin-top:15px;">Generate</button>
                    <div class="box no-border shadow" id="filePreview"
                         style="min-height:100px; max-height: 350px;overflow: scroll;">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {*Size picker*}
                <div class="col-md-12">
                    <h4>Size <i class="fa fa-expand "></i></h4>
                    <div class="col-md-12">
                        <div class="col-md-3 shadow" onclick="$(this).toggleClass('sizeSelector');"><span><b>Post It</b><br><small>76mm x 76mm</small></span>
                        </div>
                        <div class="col-md-3 shadow" onclick="$(this).toggleClass('sizeSelector');"><span><b>Post It</b><br><small>76mm x 76mm</small></span>
                        </div>
                        <div class="col-md-6 shadow" style="padding:5px;"><input class="form-control input-sm"
                                                                                 type="text"
                                                                                 placeholder="Enter dimensions"/></div>
                    </div>
                </div>
                {*Color Picker*}
                <div class="col-md-12">
                    <h4>Color <i class="fa fa-eyedropper "></i></h4>
                    <div class="col-md-12">
                        <div id="colorpicker" class="input-group col-md-6 shadow" style="padding:5px;">
                            <input type="text" value="#00AABB" class="form-control"/>
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </div>
                </div>
                {*Font picker*}
                <div class="col-md-12">
                    <h4>Font <i class="fa fa-font "></i></h4>
                    <div class="col-md-12">
                        <div class="col-md-6 shadow" style="padding:5px;">
                            <select class="form-control">
                                <option value="Arial">Arial</option>
                                <option value="Calibri">Calibri</option>
                                <option value="Helvetica">Helvetica</option>
                                <option value="Comic Sans">Comic Sans</option>
                            </select>
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
//        Init the dropzone
        Dropzone.autoDiscover = false;
        Dropzone.keepLocal = true;
        var $myDropzone = $("#my-dropzone");
        $myDropzone.dropzone({
            dictDefaultMessage: "Drag and Drop CheatSheets <br> -OR- <br> Click here",
            maxFiles: 1,
            dictMaxFilesExceeded: "You may only upload 1 file.",
            maxFilesize: 5,
            acceptedFiles: ".txt,.doc,.xml",
            dictInvalidFileType: "Only TXT Files supported yet.",
            addRemoveLinks: true,
            init: function () {
                this.on('success', function (file, resp) {
                    console.log(file);


                    //Retrieve the first (and only!) File from the FileList object
                    var f = file;

                    if (f) {
                        var r = new FileReader();
                        r.onload = function (e) {
                            var contents = e.target.result;
                            console.log(contents);
                            $('#filePreview').html(contents);
                        };
                        r.readAsText(f);
                    } else {
                        alert("Failed to load file");
                    }
                });


            }


        });
    });


</script>
<!-- /.content-wrapper -->
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}