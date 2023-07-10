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
                    <div class="card text-dark"  style="background-color: #f8f9fa; color: #333; border-radius: 1rem; box-shadow: 0 0.50rem 0.75rem rgba(0, 0, 0, 0.1);">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <?= $this->session->flashdata('message'); ?>
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your email and password!</p>

                                <form class="form-outline form-white" action="<?= base_url('auth'); ?>" method="post">
                                    <div class="form-group mb-4">
                                        <label for="email" class="pb-3">Email address</label>
                                        <input type="email" class="form-control form-control-lg text-dark" placeholder="Example@gmail.com" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg text-dark" placeholder="*****" name="password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button class="btn btn-outline-dark btn-lg px-5" type="submit">Login</button>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="<?= base_url('Auth/register'); ?>" class="text-dark fw-bold">Sign Up</a></p>

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