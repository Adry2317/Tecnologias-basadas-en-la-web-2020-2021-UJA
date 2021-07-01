<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <title>Login #9</title>
</head>

<body>



    <div class="content" style="margin-top: 100px; margin-bottom: 50px">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-4">
                                    <h3>Iniciar Sesión en Club deportivo Jaén</h3>

                                </div>


                                <?= form_open("LoginController/authLogin",["id"=>"formLogin"]) ?>


                                <div class="form-group last mb-4">
                                    <label for="Email">Email</label>
                                    <input type="text" name="Email" class="form-control" id="Email">

                                </div>


                                <div class="form-group last mb-4">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="password">

                                </div>

                                


                                <button id="loginButton" type="button"
                                    class="btn btn-pill text-white btn-block btn-primary">Iniciar Sesión</button>



                                <br><br>
                                <p align="center">Si aún no está resgistrado pinche en <a
                                        href="<?php echo base_url("RegistroControlador/index/registro") ?>">Registrarse</a></p>
                                <?php if (isset($errors)): ?>

                                <div class="alert alert-danger" role="alert">
                                    <?= \Config\Services::validation()->listErrors(); ?>

                                </div>
                                <?php endif; ?>

                                <?php if(session()->getFlashdata('msg')): ?>
                                <div class="alert alert-danger" role=alert><?= session()->getFlashdata('msg') ?></div>
                                <?php endif; ?>

                                <div id="errores" class="alert alert-danger" role="alert" style="display:none">
                                    <ul>
                                        <li id="comp1" style="display:none"></li>
                                        <li id="comp3" style="display:none"></li>

                                    </ul>

                                </div>







                                </form>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>


    <footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="<?= base_url("assets/js/loginRegistro.js"); ?>"></script>
    </footer>
</body>

</html>