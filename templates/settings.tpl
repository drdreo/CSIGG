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
                                <td>who the fuck still use this?</td>
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
                        <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>

                    </div>

                </div>
                <div class="box-header with-border">
                    <h2 class="box-title">Always up to date?</h2>

                    <form>
                        <div class="box-body form-group">

                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">

                        </div>
                        <div class="box-footer">
                            <button type="submit" class=" pull-right btn btn-sm btn-flat">Order Newsletter</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="box no-border shadow">
                <div class="box-header with-border">
                    <h2 class="box-title">Questions? <small>Feel free to contact us: </small></h2>
                    <div class="box-body">

                        <div>
                            <div class="form-group">
                                <label for=betreff">Betreff:</label>
                                <input class="form-control" id ="betreff">
                                <label for="comment">Message:</label>
                                <textarea class="form-control" rows="4" id="comment"></textarea>
                                <a href="mailto:andreas@fh-hagenberg.at?subject=look at this website&body=Hi,"><button type="button" class="btn btn-sm btn-flat pull-right" style="margin-top: 10px;">Send</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}