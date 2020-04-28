<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?= $this->flashSession->output() ?>
<?= $this->tag->form(['editprofil/editSubmit', 'method' => 'post']) ?>
    <div class="box" align = "center"> 
        <div class="content" align="center">
            <p>
                <?= $this->tag->linkTo(['login', $this->tag->image(['img/lesaja.png', 'width' => '225'])]) ?>
            </p>
            <div class="css-tabluar">
                <div class="css-lapisankedua">
                    <div class="css-lapisanketiga">
                        <div class="css-boxprofile">
                            <div class="css-editborder">
                                <a herf='/editprofil' class="css-active-title">Profile</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="css-boxpassword">
                        <div class="lapisankeduaa">
                            <div class="css-bordernormal">
                                <a href='/changepassword' class="css-title">Password</a>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
            <p><br><br>
            <input class="form-control mr-sm-2" name="nama" type="text" placeholder="<?php echo $this->session->get('AUTH_NAME'); ?>">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name="email" type="email" placeholder="<?php echo $this->session->get('AUTH_EMAIL'); ?>">
            </p><br><br>
            <div align="center">
                <a href='/' class="btn btn-outline-small btn-css btn-primary:hover" type="button">CANCEL</a>
                <a href='/dashboard' class="btn btn-submit btn-css-1 btn-primary:hover" type="button">SUBMIT</a>
            </div>
       </div>   
    </div> 
<?= $this->tag->endform() ?>
</body>
</html>