<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-sm-2"><h4 class="page-title">Perguntas</h4></div>
            <div class="col-sm-8"><input type="search" class="form-control" name="busca" id="busca" placeholder="Buscar...."></div>
            <div class="col-sm-2">
                <a href="<?php echo base_url('index.php/Back_Perguntas') ?>/adicionar" class="btn btn-success m-1-20 btn-rounded btn-outline">Adicionar</a>
            </div>
        </div>

        <div class="row">
            <div class="white-box" id="result">
                <div class="tab-content">
                    <?php $numero = ceil(sizeof($arquivos)/10); for($k = 0;$k < $numero;$k++):?>
                        <div role="tabpanel" class="tab-pane <?php if($k == 0) echo "active" ?> col-sm-12" id="<?=$k+1?>">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>DESCRICAO</th>
                                        <th>RESPOSTA</th>
                                        <th>DIFICUDADE</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody style="cursor: pointer;">
                                    
                                    <?php
                                    for($j = $k * 10;$j < ($k + 1) * 10;$j++):
                                        if($j < sizeof($arquivos)):
                                            $a = $arquivos[$j]->perg_descricao;
                                            if(strlen($a) > 60) $a = substr($a,0,60);
                                            ?>
                                            <tr>
                                                <td class="txt-oflo" onclick="redirect()"><?= $a; ?></td>
                                                <td class="txt-oflo" onclick="redirect()"><?= $arquivos[$j]->perg_accepted;?></td>
                                                <td class="txt-oflo" onclick="redirect()"><?= $arquivos[$j]->perg_nvl;?></td>
                                                <td>
                                                    <a href="<?php echo base_url('index.php/Back_Perguntas/alterar') ;?>" class="btn btn-success btn-outline m-1-20 btn-rounded">Alterar</a>
                                                    <button type="button" class="btn btn-danger btn-outline m-1-20 btn-rounded" data-toggle="modal" data-target="#modalexcluir" data-nome="<?= $arquivos[$j]->perg_descricao;?>" data-id="<?= $arquivos[$j]->perg_id;?>">Deletar</button>
                                                </td>
                                            </tr>
                                        <?php endif; if($j >= sizeof($arquivos)) break; ?>
                                    <?php endfor; ?>
                                </tbody>    
                            </table>
                        </div>
                    <?php endfor; ?>
                </div>

                <?php if($arquivos == NULL): ?><p class="text-center" style="margin-top: 30px;">Nenhum pergunta cadastrada.</p><?php endif; ?>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                         <ul class="nav pagination" role="tablist">
                        <?php for($i=0;$i<$numero;$i++): ?>
                            <li role="presentation" <?php if($i == 0) echo "class='active'"?>>
                                <a href="#<?=$i+1?>" aria-controls="home" role="tab" data-toggle="tab"><?=$i+1?></a>
                            </li>
                        <?php endfor; ?>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalexcluir"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Deseja excluir está pergunta?</h4>
            </div>
            <div class="modal-body">
                <p>Deseja excluir está pergunta?</p> 
                <div id="campo-nome-excluir"></div>

                <form action="<?php echo base_url('index.php/Back_Perguntas/excluir') ?>" method="post" id="excluir" >
                    <input type="hidden" name="id">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" onclick="excluir();">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script>

    // function redirect(){
    //     location.href = '';
    // }

    function submitform(){
        document.forms["formalterar"].submit();
    }

    function excluir(){
        document.forms["excluir"].submit();
    }

    $('#modalexcluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var nome = button.data('nome') 
        var id = button.data('id')


        var modal = $(this)
        document.getElementById('campo-nome-excluir').innerHTML = nome;
        modal.find('.modal-body form input').val(id)

    })

    $("#busca").keyup(function(){
        var busca = $("#busca").val();
        
        $.post('<?= base_url('index.php/Back_Perguntas/busca') ?>', {busca: busca}, function(data){
            $("#result").html(data);
            // alert(data);
        });
    });
</script>

