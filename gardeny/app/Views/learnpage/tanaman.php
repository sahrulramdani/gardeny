<?= $this->extend('learning/template') ?>

<?= $this->section('content'); ?>

<?= $this->include('/learning/navbar'); ?>

<section class="row w-100 py-5 bg-light" id="features">
    <div class="col-lg-6">
        <img src="/upload/<?= $dtanaman['foto']; ?>" alt="foto" class="col-img">
    </div>
    <div class="col-lg-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h6 class="text-primary">Detail Tanaman</h6>
                    <h1>Nama : <?= $dtanaman['nama_tanaman']; ?></h1>

                    <div class="feature d-flex mt-5">

                        <div>
                            <h5>Spesies : <?= $dtanaman['nama_spesies']; ?></h5>
                            <p><?= $dtanaman['keterangan_spesies']; ?></p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5>Genus : <?= $dtanaman['nama_genus']; ?></h5>
                            <p><?= $dtanaman['keterangan_genus']; ?></p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5>Famili : <?= $dtanaman['nama_famili']; ?></h5>
                            <p><?= $dtanaman['keterangan_famili']; ?></p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5 class="">Ciri Ciri :</h5>
                            <p><?= $dtanaman['ciri_tanaman']; ?></p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5 class="">Perawatan Khusus :</h5>
                            <p><?= $dtanaman['perawatan_khusus']; ?></p>
                        </div>
                    </div>
                    <div class="feature d-flex mt-4">

                        <div>
                            <a href="/learn" class="btn-get-started scrollto">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('/learning/footer'); ?>

<?= $this->endSection(); ?>