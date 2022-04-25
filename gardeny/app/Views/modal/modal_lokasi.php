<!-- Modal Lokasi -->
<div class="modal fade" id="modalLokasi" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLokasi">Tambah Data Lokasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/lokasi/tambah" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="input" class="form-control" id="id_lokasi" name="id_lokasi" autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="nama_lokasi">Nama Lokasi</label>
                        <input type="input" class="form-control" id="nama_lokasi" name="nama_lokasi" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="input" class="form-control" id="keterangan" name="keterangan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Foto</label>
                        <div>
                            <img src="" alt="pict" id="picture" width="50px" class="my-1">
                        </div>
                        <p class="peringatan" id="peringatan">Tidak Boleh Kosong!</p>
                        <input type="hidden" name="fotoLama" id="fotoLama">
                        <input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>