{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}

<div class="content-wrapper" style="min-height: 700px;">
    <div class="content-header col-md-12 box no-border">
        <div class="box-header"><h3>Infographic</h3></div>

        <div class="box-body">
            <div class="col-md-6 border-right">

                <h3>DropZone</h3>

                <form action="/file-upload" class="dropzone">
                    <input name="file" type="file" multiple>
                </form>


                <h3>Renderview</h3>

                <div class="col-md-10 col-md-push-1">
                    <div class="box no-border no-shadow">

                        <div class="box-body">
                            <span>Your created Chart</span>
                        </div>

                        <div class="box-footer">
                            <button class="btn pull-right">Render</button>
                        </div>

                    </div>
                </div>

            </div>


            <div class="col-md-6">
                <h3>Your Tools</h3>

                <div>
                    <h4 class="col-md-12" style="padding-bottom: 5px; color: #00a65a;">Title of your
                        Infographic</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>

                <div>
                    <h4 class="col-md-12" style="padding-bottom: 5px; color: #00a65a;">Legend</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" id="legend" placeholder="Legend">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="bottom" onclick="$('#top, #right, #left').removeClass('btn-info');$(this).toggleClass('btn-info')">Bottom</button>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="top" onclick="$('#bottom, #right, #left').removeClass('btn-info');$(this).toggleClass('btn-info')">Top</button>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="right" onclick="$('#top, #bottom, #left').removeClass('btn-info');$(this).toggleClass('btn-info')">Right</button>

                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-default btn-flat" id="left" onclick="$('#top, #right, #bottom').removeClass('btn-info');$(this).toggleClass('btn-info')">Left</button>

                    </div>
                </div>

                <h4 class="col-md-12" style="color: #00a65a;">ChartType</h4>
                <div>
                    <div class="col-md-3">
                        <i class="fa fa-line-chart fa-5x chart" onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-pie-chart fa-5x chart" onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-area-chart fa-5x chart" onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-bar-chart fa-5x chart" onclick="$('.chart').removeClass('chart-selected');$(this).toggleClass('chart-selected');"></i>
                    </div>
                </div>

                <h4 class="col-md-12" style="color: #00a65a;">ColorScheme </h4>
                <div>
                    <div class="col-md-3 col-xs-3 ">
                        <h4>red</h4>
                        <div class="color-scheme" onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-red1 color-scheme-element"></div>
                            <div class="col-md-3 bg-red2 color-scheme-element"></div>
                            <div class="col-md-3 bg-red3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>blue</h4>
                        <div class="color-scheme" onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-blue1 color-scheme-element"></div>
                            <div class="col-md-3 bg-blue2 color-scheme-element"></div>
                            <div class="col-md-3 bg-blue3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>green</h4>
                        <div class="color-scheme" onclick="$('.color-scheme').removeClass('color-scheme-selected');$(this).toggleClass('color-scheme-selected');">
                            <div class="col-md-3 bg-green1 color-scheme-element"></div>
                            <div class="col-md-3 bg-green2 color-scheme-element"></div>
                            <div class="col-md-3 bg-green3 color-scheme-element"></div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-3">
                        <h4>ColorPicker</h4>
                        <input type="color" class="" name="favcolor" value="#ff0000">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}