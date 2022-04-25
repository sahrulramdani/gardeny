<!-- Modal Profil -->
<div class="modal fade" id="modalProfil" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalProfil">Edit Profilmu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/profil/edit" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" class="form-control" id="id_user" name="id_user" autocomplete="off" hidden
                        value="<?= $user['id_user'] ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                            value="<?= $user['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            value="<?= $user['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="no_telp" name="no_telp" autocomplete="off"
                            value="<?= $user['no_telp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Foto</label>
                        <div>
                            <img src="upload/<?= $user['foto'] ?>" alt="pict" id="picture" width="50px" class="my-1">
                        </div>
                        <input type="hidden" name="fotoLama" id="fotoLama" value="<?= $user['foto'] ?>">
                        <input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>