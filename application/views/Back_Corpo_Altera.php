<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?= $title_pag?></h4>
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
                        <label for="primeiro"><?= $primeiro_titulo?></label>
                        <input type="<?= $tipo?>" class="form-control" name="primeiro" id="primeiro">
                    </div>
                    <div class="form-group">
                        <label for="segundo"><?= $segundo_titulo?></label>
                        <input type="<?= $tipo?>" class="form-control" name="segundo" id="segundo">
                    </div>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </form>
            </div>
        </div>  
    </div>
</div>

