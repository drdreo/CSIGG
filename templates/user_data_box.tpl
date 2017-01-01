<div class="col-lg-5">
    <div class="box no-border shadow">
        <div class="box-header with-border">
            <h3 class="box-title">User Data</h3>
        </div>
        {include file="{$smarty.const.BASETEMPLATEPATH}error.tpl"}
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group" style="width:100%">
                            <div class="col-md-6 no-padding">
                                <input type="text" class="form-control" placeholder="First Name" id="{$firstnameKey}"
                                       name="{$firstnameKey}"
                                       value="{if isset($firstnameValue)}{$firstnameValue}{/if}"/>

                            </div>
                            <div class="col-md-6 no-padding" style="margin-left: -1px; ">
                                <input type="text" id="{$lastnameKey}" name="{$lastnameKey}"
                                       value="{if isset($lastnameValue)}{$lastnameValue}{/if}" class="form-control"
                                       placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">User</label>

                    <div class="col-sm-10">
                        <input type="text" id="{$usernameKey}" name="{$usernameKey}"
                               value="{if isset($usernameValue)}{$usernameValue}{/if}" class="form-control"
                               placeholder="User Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="text" id="{$emailKey}" name="{$emailKey}"
                               value="{if isset($emailValue)}{$emailValue}{/if}" class="form-control"
                               placeholder="Email">
                    </div>
                </div>
                <div id="changePasswordBox" class="hideBox">
                    <div class="form-group">
                        <label for="inputPassword1" class="col-sm-2 control-label">New Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="{$passwordKey1}" name="{$passwordKey1}"
                                   placeholder="Password">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2" class="col-sm-2 control-label">New Password2</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="{$passwordKey2}" name="{$passwordKey2}"
                                   placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="{$newsletterKey}" name="{$newsletterKey}" {if $newsletterValue == 1}  value ="1" checked="checked" {else}value = "0" autocomplete="off"{/if}>
                                Abo Newsletter
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat pull-right">Save</button>
                <button class="btn btn-warning btn-flat pull-right" style="margin-right:10px;"
                        onclick="$('#changePasswordBox').toggleClass('hideBox'); return false;">Change
                    Password
                </button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>