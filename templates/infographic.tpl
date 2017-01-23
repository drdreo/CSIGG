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
                <div class="col-md-12">
                    <h3 class="pull-left hidden-print">RenderView</h3>
                    <button class="btn btn-flat btn-warning pull-right btn-sm hidden-print" id="render" style="margin-top: 15px;" onclick="generateInfographic()">Render</button>

                    <div class="box no-border shadow" id="filePreview"
                         style="min-height:100px; overflow: scroll;">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>

            </div>

            <div class="col-md-6 hidden-print">

                {*Title*}
                <div class="col-md-12" style="padding-bottom: 5px; color: #00a65a;">
                    <h4>Title of your Infographic</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Custom Chart Title">
                    </div>
                </div>

                {*Legend*}
                <div class="col-md-12" style="padding-bottom: 5px; color: #00a65a;">
                    <h4>Legend</h4>
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
                        <i class="fa fa-bar-chart fa-5x chart" id="bar"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-pie-chart fa-5x chart" id="pie"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3" >
                        <i class="fa fa-line-chart fa-5x chart" id="line"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-area-chart fa-5x chart" id="filledLine"
                           onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                </div>


                {*ColorSchemes*}
                <h4 class="col-md-12" style="color: #00a65a;">ColorScheme </h4>
                <div>
                    <div class="col-md-3 col-xs-3 ">
                        <h4>red</h4>
                        <div class="color-scheme color-scheme-selected" id="red"
                             onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-red1 color-scheme-element"></div>
                            <div class="col-md-3 bg-red2 color-scheme-element"></div>
                            <div class="col-md-3 bg-red3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>blue</h4>
                        <div class="color-scheme" id="blue"
                             onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-blue1 color-scheme-element"></div>
                            <div class="col-md-3 bg-blue2 color-scheme-element"></div>
                            <div class="col-md-3 bg-blue3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>green</h4>
                        <div class="color-scheme" id="green"
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
    var globalData = [];
    $(document).ready(function () {
        var title = "title";
//        Init the colorpicker input
        var cpicker = $('#colorpicker').colorpicker();

        cpicker.on('changeColor', function () {
            var rgb = hexToRgb($(this).colorpicker('getValue', '#ffffff'));
            var type = config.type;

            changeColor(rgb, type);
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
                                globalData = [];
                                console.log(JSON.parse(request));
                                var json = JSON.parse(request);
                                fillDatasets(json);
                                fillLabels(json);
                            });

                        };
                        reader.readAsText(f);
                    } else {
                        alert("Failed to load file");
                    }
                });
            }
        });

        var config = {
            type: 'bar',
            data: {
                labels: [],
                datasets: []

            },
            options: {
                legend: {
                    position: 'left'
                },
                title: {
                    display: true,
                    text: 'Custom Chart Title',
                    fontSize: 18,
                    fontFamily: 'Helvetica'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }

            }

        };

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, config);


        $("#pie").click(function() {
            changeType('pie');
        });
        $("#line").click(function() {
            changeType('line');
            changeFillofLine(false);
        });

        $("#bar").click(function() {
            changeType('bar');
        });

        $("#filledLine").click(function() {
            changeType('line');
            changeFillofLine(true);
        });

        $("#bottom").click(function() {
            changePositionLabel('bottom');
        });

        $("#top").click(function() {
            changePositionLabel('top');
        });

        $("#left").click(function() {
            changePositionLabel('left');
        });

        $("#right").click(function() {
            changePositionLabel('right');
        });

        $("#title").change(function(){
            var text = $("#title").val();
            changeTitle(text);
        });

        $('#green').click(function(){
            var type = config.type;
            changeColor('green',type);
        });

        $('#blue').click(function(){
            var type = config.type;
            changeColor('blue',type);
        });

        $('#red').click(function(){
            var type = config.type;
            changeColor('red',type);
        });


        function changeColor(color,type) {
            var ctx = document.getElementById("myChart").getContext("2d");
            var cnt = config.data.datasets[0].data.length;


            if(color instanceof Array){
                var colorpicker = color;
                color = 'custom';
            }

            var backgroundColor = [];
            var borderColor = [];
            var g = 0;
            var r = 0;
            var b = 0;

            switch (color)
            {
                case 'green': g = 255; break;
                case 'blue': b = 255; break;
                case 'red': r = 255; break;
                case 'custom':r = colorpicker[0]; g = colorpicker[1]; b = colorpicker[2]; break;
                default: r= 80; g=80; b =80; break;
            }


            if(type == 'line')
                    {
                        cnt = config.data.datasets.length;
                    }

            var vl = 230/cnt;

            for(var i = 0; i < cnt; i++)
            {

                if(g>0) g = g - vl;
                if(r>0) r = r - vl;
                if(b>0) b = b - vl;
                backgroundColor.push('rgba('+r+','+g+','+b+',0.7)');
                borderColor.push('rgba('+r+','+g+','+b+',1.0)')
            }

            for (var i = 0; i < config.data.datasets.length; i++)
            {
                config.data.datasets[i].backgroundColor = backgroundColor;
                config.data.datasets[i].borderColor = backgroundColor;
                if(type == 'line' || type == 'pie')
                {
                    config.data.datasets[i].borderWidth = 3;
                } else {
                    config.data.datasets[i].borderWidth = 0;
                }

            }
            myChart.update();
        }

/*
        function getColor(color, cnt)
        {

            for (var i = 0, i < cnt;i++)
            {

            }

            var custom[];

            var red = [[255,105,97],[255,28,0],[255,8,0],[227,66,52],[215,59,62],[206, 22, 32],[204, 0, 0],[178, 34, 34],[179, 27, 27],[164, 0, 0],[128, 0, 0],[112, 28, 28]];
            var blue = [[146, 161, 207],[42, 82, 190],[0, 0, 225],[0, 47, 167],[0, 51, 153],[0, 0, 156],[18, 10, 134],[0, 0, 139],[0, 0, 128],[25, 25, 112],[8, 37, 103]];
            var green = [[0, 204, 153],[80, 200, 120],[62, 180, 137],[3, 192, 60],[0, 168, 107],[0, 117, 94],[23, 114, 69],[0, 107, 60],[1, 68, 33],[0, 66, 37],[1, 50, 32]];
        }
*/

        function changeFillofLine(fill) {

            var ctx = document.getElementById("myChart").getContext("2d");
            var data = globalData;

            for(var i = 0; i < data.length; i++)
            {

                config.data.datasets[i].fill = fill;
            }
            destroyChart(ctx,config);
        }

        function changePositionLabel(position){
            var ctx = document.getElementById("myChart").getContext("2d");
            config.options.legend.position = position;
            destroyChart(ctx,config);
        }

        function changeTitle(title) {
            var ctx = document.getElementById("myChart").getContext("2d");
            config.options.title.text = title;
            config.options.title.fontSize = 18;

            destroyChart(ctx,config);
        }


        function changeType(newType) {
            var ctx = document.getElementById("myChart").getContext("2d");


            config.type = newType;

            switch (newType)
                    {
                case 'pie': fillLineDatasets();
                    break;
                case 'bar': fillBarPieDatasets();
                    break;
                case 'line': fillLineDatasets();
                    break;
            }

            var color = $('.color-scheme-selected').attr('id');

            changeColor(color,newType);

            destroyChart(ctx,config);
        }


        function fillDatasets(data){

            for (var i = 0; i < data.length; i++) {

                var dataChart = [];

                for (var j = 0; j < data[i].length; j++) {
                    dataChart.push(data[i][j]);
                }
                globalData.push(dataChart);
            }

        }


        function fillBarPieDatasets() {

            var ctx = document.getElementById("myChart").getContext("2d");
            var data = globalData;
            var datasets = [];

            for (var i = 1; i < data[0].length; i++) {

                var dataChart = [];

                for (var j = 0; j < data.length; j++) {
                    dataChart.push(data[j][i]);
                }
                datasets.push(fill('Dataset'+i,dataChart));
            }

            config.data.datasets = datasets;

            fillLabels(data);

            destroyChart(ctx,config);
        }


        function fillLineDatasets() {
            var ctx = document.getElementById("myChart").getContext("2d");
            var data = globalData;
            var datasets = [];

            for (var i = 0; i < data.length; i++) {

                var dataChart = [];

                for (var j = 0; j < data[0].length; j++) {
                    dataChart.push(data[i][j+1]);
                }
                datasets.push(fill('Dataset'+i,dataChart));

            }

            config.data.datasets = datasets;

            console.log(data);
            fillLabels(data);

            destroyChart(ctx,config);
        }



        function fillLabels(data) {

            console.log(data);
            var ctx = document.getElementById("myChart").getContext("2d");

            var type = config.type;

            if(type == 'bar' || type == 'pie') {

                var cnt = data.length;
                var labels = [];

                for (var i = 0; i < cnt; i++) {
                    labels.push(data[i][0]);
                }

                config.data.labels = labels;
                destroyChart(ctx, config);
            }
            else{

                var cnt2 = data[0].length-1;

                var labels2 = [];

                for (var j = 0; j < cnt2; j++) {
                    labels2.push(j);
                }

                config.data.labels = labels2;
                destroyChart(ctx, config);

            }
        }



        function destroyChart(ctx, config)
        {
            if (myChart) {
                myChart.destroy();
            }

            myChart = new Chart(ctx, config);
        }


        function fill(label,data) {

            var json = {
                fill: false,
                label: label,
                data: data,
                backgroundColor: [],
                borderColor:[],
                borderWidth: 1
            };

            return json;
        }
    });


</script>
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}