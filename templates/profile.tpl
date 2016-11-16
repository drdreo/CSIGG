{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.TNTEMPLATEPATH}navbar.tpl"}
<div class="content-wrapper" style="min-height: 590px;">
    <div class="content-header col-md-12" >
        <h1>Profile</h1>
    </div>
    <div class="col-md-6">
        <div class="box no-border shadow">
            <div class="box-header with-border">
                <h3 class="box-title">User Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right">Save</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
{include file="{$smarty.const.TNTEMPLATEPATH}footer.tpl"}