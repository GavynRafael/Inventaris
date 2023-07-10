<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        Riwayat Barang Rusak
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <?php
            $id= $users['id'];
            $query = $this->db->query("SELECT b.nama_barang, u.nama_ruangan FROM riwayat_kerusakan r JOIN barang b ON r.barang_Id = b.id JOIN ruangan u ON r.ruangan_id = u.id WHERE r.user_id = $id");
            $riwayat = $query->result_array();
            ?>

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Barang</th>
                    <th>Nama Ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($riwayat as $rw): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $rw['nama_barang']; ?></td>
                    <td><?= $rw['nama_ruangan']; ?></td>
                    <td><button class="btn btn-primary btn-sm">detail</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->