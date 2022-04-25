<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-2 w-100">
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col m-auto d-block">
            <img src="upload/<?= $user['foto'] ?>" alt="foto" class="img-profil">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col m-auto d-block text-center">
            <div class="row">
                <h3 class="color-1 fw-bold"><?= $user['nama'] ?></h3>
            </div>
            <div class="row">
                <h5 class="color-3 fw-bold"><?= $user['email'] ?></h5>
            </div>
            <div class="row mt-5">
                <p class="color-3"><?= $user['level'] ?></p>
            </div>
            <div class="row">
                <p class="color-1"><?= $user['no_telp'] ?></p>
            </div>
        </div>
    </div>
    <div class="row mt-5 m-auto d-block">
        <a data-bs-toggle="modal" data-bs-target="#modalProfil" class="btn btn-success">
            Edit Profil
        </a>
    </div>
</div>

<?= $this->include('modal/modal_profil'); ?>

<?= $this->endSection(); ?>