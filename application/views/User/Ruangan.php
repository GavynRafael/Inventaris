<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Ruangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php
                $idUser = $users['id'];
                $query = $this->db->query("SELECT r.nama_ruangan as ruangan, r.id as id_ruangan FROM ruangan r JOIN users s ON r.user_id = s.id WHERE s.id = $idUser");
                $ruangan = $query->result_array();
                ?>
                <?php foreach ($ruangan as $ru) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $ru['ruangan']; ?></td>
                        <td>
                            <a href="<?= base_url('user/detailRuangan/' . $ru['id_ruangan']) ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->