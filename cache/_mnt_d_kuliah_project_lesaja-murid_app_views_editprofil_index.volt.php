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
            <div class="css-13ookwh">
                <div class="css-3dmmu0">
                    <div class="css-1v3ribi">
                        <div class="css-qe9cpj">
                                <p class="css-1kpctqn">Profile</p>
                        </div>
                    </div>
                    <div class="css-1v3ribi">
                        <div class="css-fm4lp1">
                            <p class="css-1ckuaw8">Password</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h5><br>
            <label class="text-reset" for="reset">Change Password</label>
            </h5> -->
            <p><br>
            <input class="form-control mr-sm-2" name=nama type="text" placeholder="Masukkan Password Lama">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name=email type="email" placeholder="Masukkan Password Baru">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name=new-pwd type="password" placeholder="Konfirmasi Password Baru">
            </p><br>
            <div align="center">
                <a href='/' class="btn btn-outline-small btn-primary:hover" type="button">CANCEL</a>
                <a href='/login' class="btn btn-submit btn-primary:hover" type="button">SUBMIT</a>
            </div>
       </div>   
    </div> 
<?= $this->tag->endform() ?>
</body>
</html>