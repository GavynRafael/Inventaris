<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        Data Barang Ruangan <?= $ruangan['nama_ruangan']; ?>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahBarangModal">
            Tambah Barang
        </button>

    </h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php
                $no = 1;
                $id_ruangan = $ruangan['id'];

                $query = [
                    'query' => $this->db->query("SELECT b.nama_barang, b.id as barangId, b.kode_barang FROM barang b JOIN ruangan r on b.ruangan_id = r.id WHERE b.ruangan_id = $id_ruangan "),
                ];

                $barang = $query['query']->result_array();

                foreach ($barang as $br) {
                    // Mendapatkan ID barang dari setiap iterasi
                    $barangId = $br['barangId'];

                    // Query kedua menggunakan ID barang
                    $query1 = $this->db->query("SELECT b.id, s.kondisi_barang FROM barang b join status s ON b.status_barang = s.id WHERE b.id = $barangId");
                    $status = $query1->row_array();

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $br['kode_barang']; ?></td>
                        <td><?= $br['nama_barang']; ?></td>
                        <td><?= $status['kondisi_barang']; ?></td>
                        <td style="width: 1%; white-space: nowrap;">
                            <div class="d-grid gap-2 d-md-block" role="group">
                                <?php
                                if ($status['kondisi_barang'] == 'Bagus') {
                                    echo '<button type="button" class="btn btn-danger btn-sm flex-fill" data-toggle="modal" data-target="#laporBarangModal" data-userid="' . $users['id'] . '" data-ruanganid="' . $ruangan['id'] . '" data-barangid="' . $br['barangId'] . '" onclick="$(\'#ruanganid\').val($(this).data(\'ruanganid\')), $(\'#barangid\').val($(this).data(\'barangid\')), $(\'#userid\').val($(this).data(\'userid\')); $(\'#showmodal\').modal(\'show\');">Lapor kerusakan</button>';
                                } elseif ($status['kondisi_barang'] == 'Perbaikan') {
                                    echo '<button disabled="disabled" class="btn btn-secondary  btn-sm flex-fill">Sedang di perbaiki</button>';
                                } elseif ($status['kondisi_barang'] == 'Rusak') {
                                    echo '<button disabled="disabled" class="btn btn-success text-dark btn-sm flex-fill">Berhasil di laporkan</button>';
                                }
                                ?>
                                <a href="" class="btn btn-primary btn-sm flex-fill">Detail</a>
                            </div>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<!-- /.container-fluid -->
</div>


<!-- modal -->


<!-- tambahBarang -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" role="dialog" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBarangModalLabel">Tambah Barang</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('User/tambahBarang/' . $ruangan['id']); ?>" method="post">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- laporanKerusakan -->
<div class="modal fade" id="laporBarangModal" tabindex="-1" role="dialog" aria-labelledby="laporBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="laporBarangModalLabel">Lapor Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form di sini -->
                <form action="<?= base_url('User/laporKerusakan') ?>" method="post">
                    <!-- menangkap id dari button -->
                    <input type="hidden" name="ruanganid" id="ruanganid">
                    <input type="hidden" name="barangid" id="barangid">
                    <input type="hidden" name="userid" id="userid">

                    <div class="form-group">
                        <label for="alasan">Alasan</label>
                        <textarea class="form-control" id="alasan" name="alasan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lampiran">Foto Lampiran</label>
                        <input type="file" name="lampiran" id="lampiran" class="form-control-file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Skrip JavaScript -->