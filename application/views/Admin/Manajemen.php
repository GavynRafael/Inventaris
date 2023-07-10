<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($user as $us) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $us['username']; ?></td>
                        <td><?= $us['email']; ?></td>
                        <td>
                            <?php if ($us['role'] != 2) {
                                echo 'Admin';
                            }else{
                                echo 'user';
                            } ?>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
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