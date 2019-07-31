<?php $caminho = base_url('conf/Backend'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Pixel Admin - Responsive Admin Dashboard Template built with Twitter Bootstrap</title>
    

    <!-- Bootstrap Core CSS -->
    <link href="<?= $caminho ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $caminho ?>/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="<?= $caminho ?>/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?= $caminho ?>/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="<?= $caminho ?>/css/animate.css" rel="stylesheet">
    <link href="<?= $caminho ?>/css/style.css" rel="stylesheet">
    <link href="<?= $caminho ?>/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    
    <script src="<?= $caminho ?>/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= $caminho ?>/../ckeditor/ckeditor.js"></script>

</head>

<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="index.html">
                        <b>
                            <img src="<?= $caminho ?>/plugins/images/pixeladmin-logo.png" alt="home" />
                        </b>
                        <span class="hidden-xs"><img src="<?= $caminho ?>/plugins/images/pixeladmin-text.png" alt="home" /></span>
                    </a>
                </div>

                
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="profile-pic dropdown-toggle" data-toggle="dropdown" href="#">
                                <?php if($this->session->userdata('logado') != null): ?>
                                    <img src="<?= base_url('conf/Backend')?>/plugins/images/users/varun.jpg" width="36" class="img-circle">
                                <?php endif; ?>
                                <b class="hidden-xs"><?= $this->session->userdata('nome'); ?></b>
                            </a>

                            <ul class="dropdown-menu dropdown-user" style="width: 170px;">
                                <li>
                                    <a href="<?= base_url('index.php') ?>/Back_Perfil">
                                        <i class="fa fa-user fa-fw"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configurações</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?= base_url('index.php/Back_Login/logout')?>">
                                        <i class="fa fa-sign-out fa-fw"></i>
                                        Sair
                                    </a>
                                </li>
                            </ul>

                    </ul>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    