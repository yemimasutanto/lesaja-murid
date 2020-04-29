<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lesaja</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    {{ flashSession.output() }}
    {{ form('kelassd/kelasSD', 'method': 'post') }}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Brand -->
        <a class="navbar-brand"><img src="img/lesaja.png" width=120></a>

        <!-- Links -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto align-middle">
                <li class="nav-item align-middle" align="center">
                    <a href="/kelas" align="center">Kelas Saya<span class="sr-only"></a>
                </li>
                <nav>
                    <form name="form" action="/dashboard/search" method="post">
                        <div class="align-middle">
                            <input class="search-bar1 mr-sm-2 " type="text" name = "cari" placeholder="Kelas apa yang kamu ingin ikuti hari ini?" width=100>
                        </div>
                        <div class="search-btn1">
                            <button class="btn" name = "submit" type="submit">
                                <img src="img/search.png" width=20>
                            </button>
                        </div>
                    </form>
                </nav>
                <li>
                    <label class="nama1" for="nama_murid"><?php echo $this->session->get('AUTH_NAME'); ?></label>
                </li>
                <li>
                    <button class="btn dropdwon-toggle" id="nama_murid" data-toggle="dropdown">
                        <img src="img/user.png">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/editprofil">Edit Profile</a>
                        <a class="dropdown-item" href="/">Keluar</a>
                    </div>
                </li>
        </div>
    </nav>

    <!-- content -->
    <div class="kelas-baru">
        <div class="box-kelas">
            <div class="cover-mapel">
                <div class="mapel-judul" align="left">
                    <br><br><br>
                    <img src="img/course.png" width=60px>
                    <br><br>
                    <label class="judul" for="judul">Jenjang</label><br>
                    <label class="judul" for="judul">SD</label><br>
                    <br>
                    <label for="other">Lihat Info Lainnya</label>
                    <a href='/kelas_sd' class="btn btn-link-other">
                        <img src="img/arrow.png" width=12px>
                    </a>
                </div>
                <div class="mapel-1" align="center">
                    <div class="kotak-bi">
                        <br><br>
                        <img src="img/indonesia.png" width=60px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="indonesia">Bahasa Indonesia</label>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
                <div class="mapel-2" align="center">
                    <div class="kotak-tik">
                        <br><br>
                        <img src="img/tik.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="tik">TIK</label><br>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
                <div class="mapel-3" align="center">
                    <div class="kotak-ips">
                        <br><br>
                        <img src="img/social.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="math">Ilmu Pengetahuan Sosial</label>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-kelas box-2">
            <div class="cover-mapel">
                <div class="mapel-judul" align="left">
                    <br><br><br>
                    <img src="img/course.png" width=60px>
                    <br><br>
                    <label class="judul" for="judul">Jenjang</label><br>
                    <label class="judul" for="judul">SMP</label><br>
                    <br>
                    <label for="other">Lihat Info Tentor</label>
                    <a href='/kelas_smp' class="btn btn-link-other">
                        <img src="img/arrow.png" width=12px>
                    </a>
                </div>
                <div class="mapel-1">
                    <div class="kotak-fisika" align="center">
                        <br><br>
                        <img src="img/fisika.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="fisika">Fisika</label>
                        <br>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
                <div class="mapel-2">
                    <div class="kotak-ipa" align="center">
                        <br><br>
                        <img src="img/ipa.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="kimia">Kimia</label>
                        <br>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
                <div class="mapel-3">
                    <div class="kotak-biologi" align="center">
                        <br><br>
                        <img src="img/biologi.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="math">Biologi</label>
                        <br>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-kelas box-3">
            <div class="cover-mapel">
                <div class="mapel-judul" align="left">
                    <br><br><br>
                    <img src="img/course.png" width=60px>
                    <br><br>
                    <label class="judul" for="judul">Jenjang</label><br>
                    <label class="judul" for="judul">SMA</label><br>
                    <br>
                    <label for="other">Lihat Info Tentor</label>
                    <a href='/kelas_sma' class="btn btn-link-other">
                        <img src="img/arrow.png" width=12px>
                    </a>
                </div>
                <div class="mapel-1">
                    <div class="kotak-mat" align="center">
                        <br><br>
                        <img src="img/matematika.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="math">Matematika</label>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
                <div class="mapel-2">
                    <div class="kotak-fisika" align="center">
                        <br><br>
                        <img src="img/fisika.png" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="fisika">Fisika</label><br>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
                <div class="mapel-3">
                <div class="kotak-inggris" align="center">
                        <br><br>
                        <img src="img/inggris.png" width=60px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="english">Bahasa Inggris</label><br>
                        <button class="btn btn-primary:hover btn-join">
                            Join Kelas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <label for="footer">&#169;2020, Lesaja Murid</label>
    </div>
    </form>
</body>
</html>