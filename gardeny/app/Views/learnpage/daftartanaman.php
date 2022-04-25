<?= $this->extend('learning/template') ?>

<?= $this->section('content'); ?>

<?= $this->include('/learning/navbar'); ?>

<section id="portfolio">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h6 class="text-primary">List Tanaman</h6>
                <h1>Tanaman yang tersedia</h1>
                <p>Pelajari tanaman lebih dalam dan lengkap , kami menyediakan list tanaman yang beragam untuk kamu
                    pelajari</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <a href="https://qrcodescan.in/" target="_blank">
                    <img src="/img/scanner.png" alt="scanner" style="width: 60px;">
                </a>
            </div>
        </div>
        <div class="row g-3">
            <?php 
                foreach ($tanaman as $t) :
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="project">
                    <img src="/upload/<?= $t['foto']; ?>" alt="">
                    <div class="overlay">
                        <div class="container">
                            <h4><?= $t['nama_tanaman']; ?></h4>
                            <p><?= $t['ciri_tanaman']; ?></p>
                            <a href="/upload/<?= $t['foto']; ?>" class="preview-link" title="App 1"><i
                                    class="bx bx-plus"></i></a>
                            <a href="/learn/detail/<?= $t['id_tanaman']; ?>" class="detail-link" title="More Details"><i
                                    class="bx bx-link"></i></a>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
</section><!-- PROJECTS -->

<?= $this->include('/learning/footer'); ?>

<?= $this->endSection(); ?>