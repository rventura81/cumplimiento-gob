<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cumplimiento - <?=$title?></title>

    <!-- Bootstrap -->
    <link href="<?=URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=URL::asset('bower_components/select2/select2.css')?>" rel="stylesheet">
    <link href="<?=URL::asset('bower_components/select2-bootstrap-css/select2-bootstrap.css')?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Cumplimiento</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?=Auth::user()->nombres?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= URL::to('/backend/auth/logout'); ?>">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?=URL::to('backend/compromisos')?>">Compromisos</a></li>
                        <li><a href="<?=URL::to('backend/usuarios')?>">Usuarios</a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <?= View::make('backend/messages'); ?>
                <?=$content?>
            </div>
        </div>

    </div>
</main>
<div class="modal fade" id="modal-backend" tabindex="-1" role="dialog" aria-labelledby="Modal Backend" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<script src="<?=URL::asset('bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?=URL::asset('bower_components/select2/select2.min.js')?>"></script>
<script src="<?=URL::asset('js/backend.js')?>"></script>
</body>
</html>
