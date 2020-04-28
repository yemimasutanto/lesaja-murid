<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?= $this->flashSession->output() ?>
<?= $this->tag->form(['changepassword/changeSubmit', 'method' => 'post']) ?>
    <div class="box" align = "center"> 
        <div class="content">
            <p align="center">
                <?= $this->tag->linkTo(['login', $this->tag->image(['img/lesaja.png', 'width' => '225'])]) ?>
            </p>
            <div class="css-tabluar1">
                <div class="css-lapisankedua1">
                    <div class="css-lapisanketiga1">
                        <div class="css-boxprofile1">
                            <div class="css-bordernormal1">
                                <a href="/editprofil" class="css-title1">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="css-boxpassword1">
                    <div class="css-lapisankeduaa1">
                        <div class="css-changeborder">
                            <p class="css-title-active1">Password</p>
                        </div>
                    </div>
                </div>
            </div>
            <p><br>
            <input class="form-control mr-sm-2" name="old-pwd" type="password" placeholder="Masukkan Password Lama">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name="new-pwd" type="password" placeholder="Masukkan Password Baru">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name="new-pwd" type="password" placeholder="Konfirmasi Password Baru">
            </p><br>
            <div align="center">
                <a href='/' class="btn btn-outline-small btn-primary:hover" type="button">CANCEL</a>
                <a href='/dashboard' class="btn btn-submit btn-primary:hover" type="button">SUBMIT</a>
            </div>
       </div>   
    </div> 
<?= $this->tag->endform() ?>
</body>
</html>