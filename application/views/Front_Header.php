<!DOCTYPE html>
<html lang="pt-br">

<?php $caminho = base_url('conf/Frontend'); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $caminho ?>/ico/favicon.ico">


    <title>Quiz</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $caminho ?>/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Custom styles for this template -->
    <link href="<?php echo $caminho ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $caminho ?>/css/slider1.css" />

    
    <script>
        document.documentElement.className = "js";
        var supportsCssVars = function() {
            var e, t = document.createElement("style");
            return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
        };
        supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
    </script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="<?php echo $caminho ?>/js/modernizr.js"></script>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="box">
                    <a class="navbar-brand" href="<?php echo base_url('index.php/Front_Home') ?>">
                       <img src="<?php echo $caminho ?>\img\logo4.png" width="100" class="img-responsive"/>  
                   </a>
               </div>
           </div>

           <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url('index.php/Front_Home') ?>">HOME</a></li>
                <li><a href="<?php echo base_url('index.php/Front_Quiz') ?>">QUIZES</a></li>
                <li><a href="<?php echo base_url('index.php/Front_Salas') ?>">SALAS</a></li>
                <li><a href="<?php echo base_url('index.php/Front_Rank') ?>">RANK</a></li>
                <li><a href="<?php echo base_url('index.php/Front_Sobre') ?>">SOBRE</a></li>
                <li><a href="<?php echo base_url('index.php/Front_Contato') ?>">CONTATO</a></li>

                <?php if($this->session->userdata('logado') == 1): ?>
                    s
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="avatar">
                                <img src="<?php echo $caminho ?>/img/foto-perfil.png">
                            </div>
                        </a>                    
                        <ul class="dropdown-menu">
                            <li><a href=""><?php echo $this->session->userdata('nome'); ?></a></li>
                            <li><a href="<?php echo base_url('index.php/Back_Perfil'); ?>"><span class="glyphicon glyphicon-user"></span>&nbsp; Perfil</a></li>
                            
                            <li><a href="<?php echo base_url('index.php/Back_Login/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Sair</a></li>
                        </ul>
                    </li>
                    
                    <?php if($this->session->userdata('tipo') == "Aluno"): ?>
                    <li>
                        <a href="">
                            <i id="moedas"><?= $this->session->userdata('moedas')?></i> / <i id="pontos"><?= $this->session->userdata('pontos')?></i>
                        </a>
                    </li>
                    <?php endif; ?>

                <?php endif;?>

                <?php if($this->session->userdata('logado') != 1): ?>
                    <li><a href="<?php echo base_url('index.php/Back_Home') ?>">LOGIN</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>