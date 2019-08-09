<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <a href="<?php echo base_url('index.php/Back_Quiz') ?>/adicionar" class="btn btn-success pull-right m-1-20 btn-rounded btn-outline">Adicionar</a>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Quiz</h4>
            </div>
        </div>

        <div class="row">
            <div class="white-box">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>DESCRICAO</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($dados != NULL) :
                        foreach($dados as $dad):?>

                        <tr style="cursor: pointer;">
                            <td onclick="location.href = '<?= base_url('index.php/Back_Quiz/quiz');?>?id=<?= $dad->quiz_id?>';" class="txt-oflo"><?= $dad->quiz_nome?></td>
                            <td onclick="location.href = '<?= base_url('index.php/Back_Quiz/quiz');?>?id=<?= $dad->quiz_id?>';" class="txt-oflo"><?php if(strlen($dad->quiz_descricao) > 30) echo substr($dad->quiz_descricao,0,60).'...';
                            else echo $dad->quiz_descricao;?></td>
                            <td>
                                <input type="hidden" id="dados" value="<?= $dad->quiz_descricao?>">
                                <a href="" class="btn btn-success btn-outline m-1-20 btn-rounded" data-nome="<?= $dad->quiz_nome?>" data-id="<?= $dad->quiz_id?>" data-descricao="<?= $dad->quiz_descricao?>" data-toggle="modal" data-target="#modalalterar" onclick="ck(document.getElementById('dados').value)">Alterar</a>
                                <button type="button" class="btn btn-danger btn-outline m-1-20 btn-rounded" data-toggle="modal" data-target="#modalexcluir" data-nome="<?= $dad->quiz_nome?>" data-id="<?= $dad->quiz_id?>">Deletar</button>
                            </td>
                        </tr>

                        <?php endforeach; endif; ?>
                    </tbody>    
                </table>   

                <?php if($dados == NULL): ?> 
                    <p class="text-center" style="margin-top: 30px;">Nenhum quiz cadastrado.</p>
                <?php endif; ?>
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
                <h5 class="modal-title" >Excluir quiz?</h5>
            </div>
            <div class="modal-body">
                <p></p>
                <form action="<?= base_url('index.php/Back_Quiz/excluir')?>" method='post' id='excluirquiz'>
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

<div class="modal fade" id="modalalterar" tabindex="-1" role="dialog" aria-labelledby="modalalterar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" >Alteração do quiz</h5>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('index.php/Back_Quiz/alterar')?>" method="post" id="formalterar">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nome">Nome do formulario:</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editor">Descricao:</label>
                        <textarea name="descricao" id="alt_editor" cols="30" rows="10"></textarea>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" onclick="javascript: submitform()">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>

    function submitform(){
        document.forms["formalterar"].submit();
    }

    function excluir(){
        document.forms["excluirquiz"].submit();
    }

    $('#modalexcluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var nome = button.data('nome') 
        var id = button.data('id')


        var modal = $(this)
        modal.find('.modal-body p').text('Deseja excluir o quiz "' + nome + '" ?')
        modal.find('.modal-body form input').val(id)

    })

    $('#modalalterar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nome = button.data('nome')
        var descricao = button.data('descricao')
        

        var modal = $(this)
        modal.find('.modal-body form #nome').val(nome)
        modal.find('.modal-body form #id').val(id)
        modal.find('.modal-body form textarea').text(descricao)
    })

    function ck(str){
        // alert(str);
        CKEDITOR.instances['alt_editor'].setData(str);
    }

    CKEDITOR.replace('alt_editor',{
        toolbarGroups: [
        { name: 'clipboard', groups: [ 'clipboard' ] },
        { name: 'forms', groups: [ 'forms' ] },
        { name: 'basicstyles', groups: [ 'basicstyles'] },
        { name: 'colors', groups: [ 'colors' ] }
        ]
    });

</script>