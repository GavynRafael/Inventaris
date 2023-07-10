<!-- Begin Page Content -->

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        Data Ruangan
        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#tambahRuangModal">Tambah Ruangan</button>
    </h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Ruangan</th>
                    <th>Pengawas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($ruangan as $ru) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ru['nama_ruangan']; ?></td>
                        <?php
                        $id_pengawas = $ru['user_id'];
                        $query = $this->db->query("SELECT s.username AS pengawas FROM users s JOIN ruangan r ON s.id = r.user_id WHERE r.user_id = $id_pengawas");
                        $pengawas = $query->row_array();
                        ?>
                        <td><?= $pengawas['pengawas']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div class="modal fade" id="tambahRuangModal" tabindex="-1" aria-labelledby="tambahRuangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRuangModalLabel">Tambah Ruangan</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/Tambah_Ruangan'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pengawas" class="form-label">Nama Pengawas</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <?php
                                $users = $this->db->get('users')->result_array();
                                ?>
                                <option value="">---Pilih Pengawas---</option>
                                <?php foreach ($users as $us) : ?>
                                    <option value="<?= $us['id']; ?>"><?= $us['username']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>