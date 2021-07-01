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



    <div class="content">
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
                                    <h3>Registro en Club deportivo Jaén</h3>

                                </div>


                                <?= form_open("RegistroControlador/autentificaDatos",["id"=>"formRegistro"]) ?>


                                <div class="form-group last mb-4">
                                    <label for="Email">Email</label>
                                    <input type="text" name="Email" class="form-control" id="Email" >

                                </div>


                                <div class="form-group first">
                                    <label for="username">Usuario</label>
                                    <input type="text" name="username" class="form-control" id="username" >

                                </div>

                                <div class="form-group last mb-4">
                                    <label for="DNI">DNI</label>
                                    <input type="text" name="DNI" class="form-control" id="DNI" >

                                </div>


                                <div class="form-group last mb-4">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="password" >

                                </div>

                                <div class="form-group last mb-4">
                                    <label for="confirm_password">Repetir Contraseña</label>
                                    <input type="password" name="confirm_password" class="form-control"
                                        id="confirm_password">

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Aceptar
                                            condiciones y términos de uso</span>
                                        <input type="checkbox" id="cbox1" />
                                        <div class="control__indicator"></div>
                                    </label>

                                </div>


                                <button id="registrarse" type="button"
                                    class="btn btn-pill text-white btn-block btn-primary">Registrarse</button>



                                <br><br>
                                <?php if (isset($errors)): ?>

                                <div class="alert alert-danger" role="alert">
                                    <?= \Config\Services::validation()->listErrors(); ?>

                                </div>
                                <?php endif; ?>

                                <div id="errores" class="alert alert-danger" role="alert" style="display:none">
                                    <ul>
                                        <li id="comp1" style="display:none"></li>
                                        <li id="comp2" style="display:none"></li>
                                        <li id="comp3" style="display:none"></li>
                                        <li id="comp4" style="display:none"></li>
                                        <li id="comp5" style="display:none"></li>
                                        <li id="comp6" style="display:none"></li>
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