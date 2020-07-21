<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$login = $login ?? false;
$token = $token ?? null;
$hash = $hash ?? null;
$action = $action ?? null;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | ResumeBuilder App</title>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/login/assets/css/login.css">
    </head>

    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="<?=base_url()?>assets/login/assets/images/login.jpg" alt="login" class="login-card-img">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <div class="brand-wrapper">
                                    <img src="<?=base_url()?>assets/login/assets/images/logo.svg" alt="logo" class="logo">
                                </div>
                                <p class="login-card-description">Sign into your account</p>
                                <?php if(!empty($this->session->flashdata('error'))):?>
                                    <p class="alert alert-danger">
                                        <?=$this->session->flashdata('error')?>
                                    </p>
                                <?php endif;?>
                                <form action="<?=$action?>" method="post">
                                    <input type="hidden" name="<?=$token?>" value="<?=$hash?>" />
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" name="email" id="email" required class="form-control" placeholder="Email address">
                                    </div>
                                    <?php if(!$login):?>
                                    <div class="form-group">
                                        <label for="mobile" class="sr-only">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" required class="form-control" placeholder="9999999999" maxlength="10">
                                    </div>
                                    <?php endif;?>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password" id="password" required class="form-control" placeholder="***********">
                                    </div>
                                    <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="<?=$login? 'Login': 'Register'?>">
                                </form>
                                <?php if(!empty(validation_errors())):?>
                                <div class="text-danger">
                                    <?=validation_errors()?>
                                </div>
                                <?php endif;?>
                                <?php if($login):?>
                                <p class="login-card-footer-text">Don't have an account? <a href="<?=site_url("register")?>" class="text-reset">Register here</a></p>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>