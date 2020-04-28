<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
{{ flashSession.output() }}
{{ form('reset/resetSubmit', 'method': 'post') }}
    <div class="box" align = "center"> 
        <div class="content" align="center">
            <p>
                {{ link_to('login', image('img/lesaja.png', 'width': '250')) }}
            </p>
            <h5><br>
            <label class="text-reset" for="reset">Reset Password</label>
            </h5>
            <p><br>
            <input class="form-control mr-sm-2" name=email type="email" placeholder="Email">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name=old-pwd type="password" placeholder="Masukkan Password Lama">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name=new-pwd type="password" placeholder="Konfirmasi Password Baru">
            </p><br>
            <div align="center">
                <a href='/' class="btn btn-outline-small btn-primary:hover" type="button">CANCEL</a>
                {{ submit_button('SUBMIT', 'class':'btn btn-submit btn-primary:hover') }}
            </div>
       </div>   
    </div> 
{{ endform()}}
</body>
</html>