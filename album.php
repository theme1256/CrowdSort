<?php
    include "/var/www/crowdsort/include/head.php";
    if(isset($_GET['ID'])){ // Load et eksisterende album
?>
<?php }else{ // Et nyt album ?>
<div class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="grid" id="errors">
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="row top-grids">
            <div class="col-md-8 col-md-offset-2 grid1">
                <div class="grid">
                    <h2>Create new album</h2>
                    <form id="newAlbum">
                        To create a new album, first type the name of the album and the rest of the form will show.<br/>
                        Name: <input type="text" name="name" id="name" placeholder="Name of the album" value=""/><br/>
                        <div id="newAlbum2">
                            <input type="checkbox" id="active" name="active" value="1" checked="checked"/><label for="active">This album is active</label>
                            <br/>
                            Number of admins, that have to mark a picture for deletion before it is deleted: <input type="number" name="delete" id="delete" value="1"/>
                            <br/>
                            <h3>Sharing:</h3>
                            <input type="radio" name="share" id="share0" value="0" checked="checked"/><label for="share0">Not shared</label><br/>
                            <input type="radio" name="share" id="share1" value="1"/><label for="share1">Shared by passing link</label><br/>
                            <div id="shareLink">Link: http://crowdsort.folkmann.tk/album/albumID</div>
                            <input type="radio" name="share" id="share2" value="2"/><label for="share2">Shared by invite</label><br/>
                            <div id="inviteShare">
                                To invite people type their alias or email below and click invite.<br/>
                                If the email is not found an email will be send to that email with a link to register.<br/>
                                <input type="text" name="invite" id="invite" value="" style="margin-left: 0;" placeholder="Alias or email"/>
                                <input type="submit" value="Invite" id="INVITE"/><br/>
                                <div id="inviteError"></div>
                                <div id="invited">People invited to this album: </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(function(){

                });
            </script>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php
    }
    include ROD."include/foot.php";
?>