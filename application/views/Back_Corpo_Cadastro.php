<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cadastro de Usuarios</h4>
            </div>
        </div>

        <div class="row">
            <form class="form-horizontal" action="<?php echo base_url('index.php/Back_Login/cadastrar') ?>" method="post">
                <div class="col-md-4 col-xs-12">
                    <div class="white-box">
                        <div class="user-bg">
                            <img width="100%" alt="user" src="<?php echo base_url('conf/Backend/') ?>plugins/images/large/img1.jpg">
                            <div class="overlay-box">
                                <div class="user-content">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url('conf/Backend/') ?>/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                                    </a>
                                    <h4 class="text-white">Sem Foto</h4>
                                    <h5 class="text-white">caminho</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <div class="form-group">
                            <label class="col-md-12">Nome de usuario:</label>
                            <div class="col-md-12">
                                <input type="text" name="nome" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nome Completo:</label>
                            <div class="col-md-12">
                                <input type="text" name="nomecompleto" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipo de usuario:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="identificacao">
                                <option>Aluno</option>
                                <option>Professor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Descricao</label>
                            <div class="col-md-12">
                                <textarea rows="5" name="descricao" class="form-control" id="descricao"></textarea>
                            </div>
                        </div><br>

                        <script>
                            CKEDITOR.replace( 'descricao' , {
                                toolbarGroups: [
                                { name: 'clipboard', groups: [ 'clipboard' ] },
                                { name: 'forms', groups: [ 'forms' ] },
                                { name: 'basicstyles', groups: [ 'basicstyles'] },
                                { name: 'colors', groups: [ 'colors' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] }
                                ],
                                coreStyles_bold : { element : 'b' },
                                height: 80,
                                expand : false,
                                enterMode: CKEDITOR.ENTER_P,
                                shiftEnterMode  : CKEDITOR.ENTER_BR
                            });
                        </script>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control " name="email" id="example-email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Senha</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="senha">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success btn-outline btn-rounded m-1-20">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
