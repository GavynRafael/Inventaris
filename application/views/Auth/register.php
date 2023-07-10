<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        }
    </style>
    <title>Login</title>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-2 pb-5">
                                <h2 class="fw-bold mb-5 text-uppercase">registration</h2>
                                <form class="form-outline form-white" action="<?= base_url('Auth/register'); ?>" method="post">
                                    <div class="form-group my-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg" name="email" value="<?= set_value('email'); ?>">
                                        <small class="text-danger pl-3"><?= form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="password">Username</label>
                                        <input type="text" class="form-control form-control-lg" name="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="role">Role</label>
                                        <select class="form-control form-control-lg" name="role">
                                            <option value="">--Choose the Role--</option>
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button class="btn btn-outline-dark btn-lg px-5 mt-5" type="submit">submit</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">Do you already have an account? <a href="<?= base_url('Auth'); ?>" class="text-dark fw-bold">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>