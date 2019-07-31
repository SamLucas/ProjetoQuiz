<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" id="theme" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#table-peruntas').DataTable();
} );
</script>


<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 class="page-title"><?= $dados['quiz_nome'];?></h4>
            </div>
        </div>

        <div class="row">
            <div class="white-box">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="https://placeholdit.imgix.net/~text?txtsize=38&txt=400%C3%97400&w=230&h=200" class="w-100">
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block px-3">
                                <h4 class="card-title"><?= $dados['quiz_nome'];?></h4>
                                <p class="card-text"><?php echo $dados['quiz_descricao'] ?></p>
                                <em><?= $nome_professor;?></em>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="white-box">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#add" data-toggle="tab">Salas Relacionadas</a></li>
                        </ul>
                    </div>
                </div>

                <form action="add_sala_quiz" method="post" id="busca-sala" class="form">
                    <input type="hidden" name="id_quiz" value="<?php echo $dados['quiz_id']; ?>">
                    <div class="input-group">
                        <input type="text" name="busca" id="" class="form-control" aria-describedby="icon-busca" placeholder="Entre com o nome da sala ou sua idetificação ex: #487584">
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-rounded btn-outline" type="submit">Buscar</button>
                        </span>
                    </div>
                </form>

                <table class="table table-hover" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <td>NOME</td>
                            <td>NIVEL</td>
                            <td>AÇÃO</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  if($salas != NULL) 
                        foreach($salas as $dad):?>
                        <tr>
                            <td class="txt-oflo"><?= substr($dad->sala_nome,0,30) ?></td>
                            <td class="txt-oflo"><?= $dad->sala_descricao ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/Back_Quiz/removesala') ?>?id=<?= $dad->sala_id?>&id_quiz=<?= $dados['quiz_id']?>" class="btn btn-danger btn-outline m-1-20 btn-rounded">Remover</a>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php if($salas == NULL): ?> 
                    <p class="text-center" style="margin-top: 30px;">Nenhum sala associada.</p>
                <?php endif; ?>
            </div>

            <?php if(isset($alert)): ?>
                <div class="<?php echo $type; ?> col-lg-12">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $title; ?></strong><?php echo $mensagem; ?>
                </div>
            <?php  endif; ?>

            <div class="white-box">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#add" data-toggle="tab">Adicionar perguntas</a></li>
                            <li><a href="#adicionadas" data-toggle="tab">Perguntas adicionadas</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="add">
                                <!-- <form action="">
                                    <div class="input-group" style="margin-top: -20px;">
                                        <input type="text" name="busca" id="" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-rounded btn-outline" type="button">Buscar</button>
                                        </span>
                                    </div>
                                </form> -->

                                <table id="table-peruntas" style="margin-top: 20px;">
                                    <thead>
                                        <tr>
                                            <td>DESCRIÇÃO</td>
                                            <td>NIVEL</td>
                                            <td>RESPOSTA</td>
                                            <td>AÇÃO</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if($perguntas_professor != NULL) 
                                        foreach($perguntas_professor as $dad):?>
                                        <tr>
                                            <td class="txt-oflo">
                                                <?php 
                                                for($i = 0;$i< 40;$i++){
                                                    echo $dad->perg_descricao[$i]; 
                                                }
                                                ?>...  
                                            </td>
                                            <td class="txt-oflo"><?= $dad->perg_nvl?></td>
                                            <td class="txt-oflo"><?= $dad->perg_accepted?></td>
                                            <td>
                                                <a href="<?php echo base_url('index.php/Back_quiz/addpergunta') ?>?id=<?= $dad->perg_id?>&id_quiz=<?= $dados['quiz_id']?>" class="btn btn-success btn-outline m-1-20 btn-rounded">Adicionar</a>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="adicionadas">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>DESCRICAO</th>
                                            <th>RESPOSTA</th>
                                            <th>DIFICUDADE</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($perguntas_quiz != NULL) 
                                        foreach($perguntas_quiz as $dad):?>
                                        <tr>
                                            <td class="txt-oflo">
                                                <?php 
                                                for($i = 0;$i< 30;$i++){
                                                    echo $dad->perg_descricao[$i]; 
                                                }
                                                ?>...  
                                            </td>
                                            <td class="txt-oflo"><?= $dad->perg_accepted?></td>
                                            <td class="txt-oflo"><?= $dad->perg_nvl?></td>
                                            <td>
                                                <a href="<?php echo base_url('index.php/Back_quiz/removepergunta') ?>?id=<?= $dad->perg_id?>&id_quiz=<?= $dados['quiz_id']?>" class="btn btn-danger btn-outline m-1-20 btn-rounded">Remover</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>    
                                </table>   
                                <?php if($perguntas_quiz == NULL): ?> 
                                    <p class="text-center" style="margin-top: 30px;">Nenhum pergunta cadastrada.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Formulário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="ola"></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <form action="<?= base_url('index.php/Back_Quiz/excluir')?>" method='post'>
                    <input type="hidden" name="id" id="">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function submitform(){
        document.forms["formalterar"].submit();
    }

    $('#modalexcluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var nome = button.data('nome') 
        var id = button.data('id')


        var modal = $(this)
        modal.find('.modal-body p').text('Deseja excluir o quiz "' + nome + '" ?')
        modal.find('.modal-footer form input').val(id)

    })

</script>










<!-- 


<div class="modal fade" id="addpergunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h5 class="modal-title" id="exampleModalLabel">Adicionar perguntas</h5>
</div>
<div class="modal-body">
<form action="<?= base_url('index.php/Back_quiz/busca')?>">
<input type="text" name="busca" id="busca">
<a href=""><i class="fa fa-search"></i></a>
</form>

<script>
$(document).ready(function(){

$('#busca').keyup(function(){

$('form').submit(function(){
var dados = $(this).serialize();

$.ajax({
url: '<?= base_url();?>/index.php/Back_quiz/busca',
method: 'post',
dataType: 'html',
data: {busca : busca},
success: function(data){
$('#resultado').html(data);
}
});

return false;
});

$('form').trigger('submit');

});
});
</script>

<div id="resultado">
<table class="table">
<thead>
<tr>
<th>DESCRICAO</th>
<th>NIVEL</th>
<th>AÇÃO</th>
</tr>
</thead>
<tbody>

</tbody>    
</table>   

</div>
<?php if($perguntas_professor == NULL): ?> 
<p class="text-center" style="margin-top: 30px;">Nenhum pergunta cadastrada.</p>
<?php endif; ?>

<nav aria-label="Page navigation">
<ul class="pagination">
<li>
<a href="#" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li>
<a href="#" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
</nav>

</div>
<div class="modal-footer">
<div class="container-fluid">
<div class="row">

<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger">Excluir</button>
</div>
</div>
</div>
</div>
</div>
</div>
-->