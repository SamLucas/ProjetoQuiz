<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Login</h4>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 white-box " style="margin: 0 auto !important">
            <div class="configdiv">

                <?php if(isset($mensagem)): ?>
                    <div class="<?= $type?>">
                        <strong><?= $title?></strong> <?= $mensagem; ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('index.php/Back_Login/verificar');?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de usuario:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="identificacao">
                            <option>Aluno</option>
                            <option>Professor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email do Uduario</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entre com o nome do usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <a href="<?php echo base_url('index.php/Back_Login/cadastro') ?>" class="pull-right">Novo cadastro</a>
                        <p><a href="">Esqueceu a senha/email?</a></p>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>  
    </div>
</div>

