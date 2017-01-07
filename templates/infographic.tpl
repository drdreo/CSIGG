{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}

<div class="content-wrapper" style="min-height: 700px;">
    <div class="col-md-12 box no-border">
        <div class="box-header">
            <h3>Infographic</h3>
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
                    <h3 class="pull-left">RenderView</h3>
                    <button class="btn btn-flat btn-warning pull-right btn-sm" style="margin-top: 15px;">Render</button>

                    <div class="box no-border shadow" id="filePreview"
                         style="min-height:100px; overflow: scroll;">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                {*Title*}
                <div class="col-md-12" style="padding-bottom: 5px; color: #00a65a;">
                    <h4>Title of your Infographic</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>

                {*Legend*}
                <div class="col-md-12" style="padding-bottom: 5px; color: #00a65a;">
                    <h4>Legend</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" id="legend" placeholder="Legend">
                    </div>
                </div>

                {*Buttons for Legend*}
                <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="bottom"
                                onclick="$('#top, #right, #left').removeClass('btn-info');$(this).toggleClass('btn-info')">
                            Bottom
                        </button>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="top"
                                onclick="$('#bottom, #right, #left').removeClass('btn-info');$(this).toggleClass('btn-info')">
                            Top
                        </button>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="right"
                                onclick="$('#top, #bottom, #left').removeClass('btn-info');$(this).toggleClass('btn-info')">
                            Right
                        </button>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="left"
                                onclick="$('#top, #right, #bottom').removeClass('btn-info');$(this).toggleClass('btn-info')">
                            Left
                        </button>

                    </div>
                </div>

                {*Charts*}
                <h4 class="col-md-12" style="color: #00a65a;">ChartType</h4>
                <div>
                    <div class="col-md-3">
                        <i class="fa fa-line-chart fa-5x chart"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-pie-chart fa-5x chart"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-area-chart fa-5x chart"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-bar-chart fa-5x chart"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                </div>


                {*ColorSchemes*}
                <h4 class="col-md-12" style="color: #00a65a;">ColorScheme </h4>
                <div>
                    <div class="col-md-3 col-xs-3 ">
                        <h4>red</h4>
                        <div class="color-scheme"
                             onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-red1 color-scheme-element"></div>
                            <div class="col-md-3 bg-red2 color-scheme-element"></div>
                            <div class="col-md-3 bg-red3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>blue</h4>
                        <div class="color-scheme"
                             onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-blue1 color-scheme-element"></div>
                            <div class="col-md-3 bg-blue2 color-scheme-element"></div>
                            <div class="col-md-3 bg-blue3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>green</h4>
                        <div class="color-scheme"
                             onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-green1 color-scheme-element"></div>
                            <div class="col-md-3 bg-green2 color-scheme-element"></div>
                            <div class="col-md-3 bg-green3 color-scheme-element"></div>
                        </div>
                    </div>

                    {*Color Picker*}
                    <div class="col-md-3 col-xs-3">
                        <h4>color <i class="fa fa-eyedropper "></i></h4>
                        <div id="colorpicker" class="input-group col-md-6">
                            <input type="text" value="#00AABB" class="form-control" style="min-width: 70px;"/>
                            <span class="input-group-addon"><i></i></span>
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
            acceptedFiles: ".txt,.xml,.csv",
            dictInvalidFileType: "Only Data Files supported yet.",
            addRemoveLinks: true,
            init: function () {
                this.on('success', function (file, resp) {
                    console.log(file);


                    //Retrieve the first (and only!) File from the FileList object
                    var f = file;

                    if (f) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var contents = reader.result;
                            console.log(contents);

                            var url = "ajax_convert_csv.php";
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: { text1: contents},
                                context: document.body
                            }).success(function (request) {
                                console.log(request);
                            });

                        };
                        reader.readAsText(f);
                    } else {
                        alert("Failed to load file");
                    }
                });
            }
        });

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })

</script>
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}