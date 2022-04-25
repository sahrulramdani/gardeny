<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="/beranda" class="logo"><img src="/img/logo/gardeny.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <?php 
                if (session()->get('LOGIN_SUCCESS')){
                    ?><li><a href="/dashboard" class="btn-get-started scrollto">Kembali</a></li><?php
                }else{
                    ?><li><a href="/home" class="btn-get-started scrollto">Kembali</a></li><?php
                }
                ?>
                <li><a class="nav-link scrollto" href="/Beranda">Beranda</a></li>
                <li><a class="nav-link scrollto" href="/Learn">Tanaman</a></li>
                <li><a class="nav-link scrollto" href="/About">Tentang</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->