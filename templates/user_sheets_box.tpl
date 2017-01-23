<div class="col-lg-7">
    <div class="box no-border shadow">
        <div class="box-header with-border">
            <h3 class="box-title">User Sheets</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {foreach key=cid item=con from=$cheatSheets}
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="{$con.path}" alt="">
                        <div class="caption">
                            <h5>{$con.created}</h5>
                        </div>
                    </a>
                </div>
                {foreachelse}
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                        <div class="caption">
                            <h5>No CheatSheets yet!</h5>
                        </div>
                    </a>
                </div>
            {/foreach}
        </div>
        <!-- /.box-body -->
    </div>
</div>