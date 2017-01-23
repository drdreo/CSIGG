{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}  
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}

<div class="content-wrapper" style="min-height: 670px;">
    <div class="content-header col-md-12">

        <h1><i class="fa fa-envelope"></i> Contact</h1>
    </div>

    <div class="col-md-12">
        <div class="col-md-8">
            <div class="box no-border shadow">
                <div class="box-header with-border">
                    <h3 class="box-title">Impressum</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table">
                            <th colspan="2" class="info">Things you need to know about us.</th>

                            <tr>
                                <td>created by</td>
                                <td>Andreas Hahn <br> Sarah Schauppenlehner</td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>16. Nov 2016</td>
                            </tr>
                            <tr>
                                <td>Motivation</td>
                                <td>We are highly motivated to make the life of the Students easier.</td>
                            </tr>
                            <tr>
                                <td>Impressum</td>
                                <td>CSIGG is a modern Website which offers a CheatSheet and an Infographic Generator.
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Softwarepark 41/6 <br> 4232 Hagenberg im Mühlkreis <br> Austria</td>
                            </tr>
                            <tr>
                                <td>Telephone Number</td>
                                <td>0642 9474793</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>andreas@fh-hagenberg.at <br>sarah@fh-hagenberg.at</td>
                            </tr>
                            <tr>
                                <td>Fax</td>
                                <td>who the fax still owns one?</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="box no-border shadow">
                <div class="box-header with-border">
                    <h2 class="box-title">Follow us:</h2>
                    <div class="box-body">
                        <a href="https://www.facebook.at" class="btn btn-social-icon btn-facebook"><i
                                    class="fa fa-facebook"></i></a>
                        <a href="https://www.twitter.at" class="btn btn-social-icon btn-twitter"><i
                                    class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com" class="btn btn-social-icon btn-instagram"><i
                                    class="fa fa-instagram"></i></a>

                    </div>

                </div>
                <div class="box-header with-border">
                    <h2 class="box-title">Questions?
                        <small>Feel free to contact us:</small>
                    </h2>

                    <!-- form start -->
                    <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data"
                          class="form-horizontal">
                        {include file="{$smarty.const.BASETEMPLATEPATH}error.tpl"}

                        <div class="box-body">
                            <div>
                                <div class="form-group">
                                    <label for=betreff">Betreff:</label>
                                    <input class="form-control" id="{$subjectKey}" name="{$subjectKey}"
                                           value="{if isset($subjectValue)}{$subjectValue}{/if}"/>
                                    <label for="comment">Message:</label>
                                    <textarea class="form-control" rows="4" id="{$messageKey}"
                                              name="{$messageKey}"> {if isset($messageValue)}{$messageValue}{/if}</textarea>
                                    <button type="submit" class="btn btn-sm btn-primary btn-flat pull-right"
                                            style="margin-top: 10px;"
                                    ">Send
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}