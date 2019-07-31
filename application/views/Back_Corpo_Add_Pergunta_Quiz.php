<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Quiz - Adicionar Perguntas</h4>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!--col -->
            <div class="white-box">

                <form action="<?php echo base_url('index.php/Back_Quiz') ?>/cadastro" method="post" >

                    <div class="form-group">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <td><strong>Descrição</strong></td>
                                    <td><strong>Nivel</strong></td>
                                    <td><strong>Ação</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <a href="">
                                    <tr>
                                        <td>Descriçãasdasdo</td>
                                        <td>Nivelasdasd</td>
                                        <td>Aasdasdção</td>
                                    </tr>
                                </a>
                                <tr>
                                    <td>Descriçãasdasdo</td>
                                    <td>Nivelasdasd</td>
                                    <td>Aasdasdção</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <button type="submit" class="btn btn-success m-1-20 btn-outline btn-rounded pull-right">Adicionar Pergunta</button>
                    <a href="<?php echo base_url('index.php/Back_Quiz') ?>" class="btn btn-danger m-1-20 btn-outline btn-rounded" >Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</div>
