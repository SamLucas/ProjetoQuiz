<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success pull-right m-1-20 btn-rounded btn-outline">Adicionar</a>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Salas</h4>
            </div>
        </div>

        <div class="row">
            <div class="white-box">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>DESCRIÇÃO</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($dados != null) 
                                foreach($dados as $dad):?>
                        <tr>
                            <td style="cursor: pointer;" class="txt-oflo" onclick="location.href = '<?= base_url('index.php/Back_Salas/salas');?>?id=<?= $dad->sala_id?>';"><?= $dad->sala_nome?></td>
                            <td style="cursor: pointer;" class="txt-oflo" onclick="location.href = '<?= base_url('index.php/Back_Salas/salas');?>?id=<?= $dad->sala_id?>';"><?= $dad->sala_descricao?></td>
                            <td>
                                <input type="hidden" id="dados" value="<?= $dad->sala_descricao?>">
                                <button class="btn btn-success btn-outline m-1-20 btn-rounded col-sm-2 m-1-20" data-toggle="modal" data-target="#modalalterar" data-nome="<?= $dad->sala_nome?>" data-id="<?= $dad->sala_id?>" onclick="ck(document.getElementById('dados').value)" >Alterar</button>
                                <form action="<?= base_url('index.php/Back_Salas/deletar'); ?>" method="post" class="col-sm-2 m-1-20">
                                    <input type="hidden" name="id" value="<?= $dad->sala_id?>">
                                    <button type="button" class="btn btn-danger btn-outline m-1-20 btn-rounded" data-toggle="modal" data-target="#modalexcluir" data-nome="<?= $dad->sala_nome?>" data-id="<?= $dad->sala_id?>">Deletar</button>
                                </form>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>    
                </table>   

                <?php if($dados == null): ?> 
                <p class="text-center" style="margin-top: 20px;">Nenhuma sala cadastrada.</p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <h4 class="page-title">Cadastro de salas</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" id="formulario" action="<?= base_url('index.php/Back_Salas/adicionar') ?>">
                        <div class="form-group">
                            <label for="nome">Sala:</label>
                            <input type="text" type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="editor">Descricao:</label>
                            <textarea name="descricao" id="descricao" rows="10" cols="80"></textarea>
                            <script>CKEDITOR.replace('descricao',{
                                 toolbarGroups: [
                                { name: 'clipboard', groups: [ 'clipboard' ] },
                                { name: 'forms', groups: [ 'forms' ] },
                                { name: 'basicstyles', groups: [ 'basicstyles'] },
                                { name: 'colors', groups: [ 'colors' ] }
                            ]
                            });</script>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-rounded btn-outline" onclick="$('#formulario').submit()">Adicionar</a>
                <a class="btn btn-danger btn-rounded btn-outline" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalalterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <h4 class="page-title">Alterar de salas</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" id="formaltera" action="<?= base_url('index.php/Back_Salas/Alterar') ?>">

                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nome">Sala:</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="editor">Descricao:</label>
                            <textarea name="descricao" id="alt_editor" rows="10" cols="80"></textarea>
                            <script>CKEDITOR.replace('alt_editor',{
                                 toolbarGroups: [
                                { name: 'clipboard', groups: [ 'clipboard' ] },
                                { name: 'forms', groups: [ 'forms' ] },
                                { name: 'basicstyles', groups: [ 'basicstyles'] },
                                { name: 'colors', groups: [ 'colors' ] }
                            ]
                            });</script>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-rounded btn-outline" onclick="$('#formaltera').submit()">Salvar</a>
                <a class="btn btn-danger btn-rounded btn-outline" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" >Excluir Sala?</h5>
            </div>
            <div class="modal-body">
                <p></p>
                <form action="<?= base_url('index.php/Back_Salas/deletar')?>" method='post' id='excluirquiz'>
                    <input type="hidden" name="id" id="id-excluir">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" onclick="excluir()">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('#modalalterar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var descricao = button.data('descricao')
        var nome = button.data('nome') 
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body form input#nome').val(nome)
        modal.find('.modal-body form input#id').val(id)
    })

    function ck(str){
        // alert(str);
        CKEDITOR.instances['alt_editor'].setData(str);
    }

    $('#modalexcluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var nome = button.data('nome') 
        var id = button.data('id')


        var modal = $(this)
        modal.find('.modal-body p').text('Deseja excluir a sala "' + nome + '" ?')
        modal.find('.modal-body form input').val(id)

    })

     function excluir(){
        document.forms["excluirquiz"].submit();
    }
</script>