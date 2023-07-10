<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-6">

            <!-- Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                </div>
                <div class="card-body">
                    <p>Nama: <?= strtoupper($users['username']); ?></p>
                    <p>Email: <?= $users['email']; ?></p>
                    <?php
                    if ($users['role'] == 2) {
                        $id = $users['id'];
                        $query = $this->db->query("SELECT r.id, r.nama_ruangan, s.username FROM ruangan r JOIN users s ON r.user_id = s.id where r.user_id = $id");
                        $ruangan = $query->result_array();

                        if (!empty($ruangan)) {
                            echo '<p>Pengawas Ruangan:</p>';
                            echo '<ul>';
                            foreach ($ruangan as $ru) {
                                echo "<li>" . $ru['nama_ruangan'] . "</li>";
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>Tidak ada ruangan yang diawasi.</p>';
                        }
                    }

                    ?>

                </div>
            </div>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->