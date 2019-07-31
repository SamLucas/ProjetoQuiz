<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?= $dados[0]['sala_nome'];?></h4>
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
                                <h4 class="card-title"><?= $dados[0]['sala_nome'];?></h4>
                                <p class="card-text"><?php echo $dados[0]['sala_descricao'] ?></p>
                                <em><?= 'Prof: '.$this->session->userdata('nome');?></em>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="white-box">
                <div class="row">
                    <div class="col-sm-7">
                        <form action="add_aluno" method="post" id="busca-aluno" class="form">
                                <input type="hidden" name="id_sala" value="<?php echo $dados[0]['sala_id']; ?>">
                                <input type="text" name="nome" id="" class="form-control" aria-describedby="icon-busca" placeholder="Entre com o nome do aluno ou sua idetificação ex: #487584">
                        </form>
                    </div>
                    <button type="submit" class="col-sm-2 btn btn-success btn-rounded btn-outline form" id="icon-busca" onclick="document.forms['busca-aluno'].submit()">Adicionar</button>
                    <div class="btn-group right col-sm-3">
                        <button type="button" class="btn btn-danger dropdown-toggle btn-outline" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-outline">Link de convite</button>
                        <div class="dropdown-menu  col-md-10" style="width: 280px;padding: 20px; margin-right: 80px;">
                            <div class="">

                                <h3>Link da sala</h3>
                                <h5>Qualquer aluno podera entrar nessa sala através desse link.</h5>
                                <div class="input-group">

                                    <input type="text" class="form-control" value="<?php echo base_url('index.php/Back_Salas/entrar?id=').$dados[0]['sala_id'] ?>" aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="basic-addon2" ><i class="glyphicon glyphicon-paste"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(isset($alert)): ?>
                <div class="<?php echo $type; ?> col-lg-12">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $title; ?></strong><?php echo $mensagem; ?>
                </div>
            <?php  endif; ?>


            <div class="white-box">

                <table class="table table-hover">
                    <thead>
                        <th>COD</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>AÇÂO</th>
                    </thead>
                    <tbody>

                        <?php if($alunos != NULL)
                        foreach($alunos as $dad): ?>
                        <tr>
                            <td><?= $dad->alun_cod ?></td>
                            <td><?= $dad->alun_nome ?></td>
                            <td><?= $dad->alun_email ?></td>
                            <td><button class="btn btn-rounded btn-outline btn-danger">Remover</button></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                <?php if($alunos == NULL): ?>
                    <p class="text-center" style="margin-top: 30px;">Nenhum aluno registrado.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

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
                <form action="<?= base_url('index.php/Back_Sala/busca')?>">
                    <input type="text" name="busca" id="busca">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>

                <script>
                    $(document).ready(function(){

                        $('#busca').keyup(function(){

                            $('form').submit(function(){
                                var dados = $(this).serialize();

                                $.ajax({
                                    url: '<?= base_url();?>/index.php/Back_sala/busca',
                                    method: 'post',
                                    dataType: 'html',
                                    data: {busca : busca},
                                    success: function(data){
                                        $('#resultado').empty().html(data);
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
                                <td>
                                    <a href="<?php echo base_url('index.php/Back_Perguntas/alterar') ?>?id=<?= $dad->perg_id?>" class="btn btn-success btn-outline m-1-20 btn-rounded">Alterar</a>
                                    <button type="button" class="btn btn-danger btn-outline m-1-20 btn-rounded" data-toggle="modal" data-target="#modalexcluir" data-nome="<?= $dad->perg_descricao?>" data-id="<?= $dad->perg_id?>">Deletar</button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>    
                </table>   

            </div>
            <?php if($perguntas_professor == NULL): ?> 
                <p class="text-center" style="margin-top: 30px;">Nenhum pergunta cadastrada.</p>
            <?php endif; ?>
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
                <form action="<?= base_url('index.php/Back_Sala/excluir')?>" method='post'>
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
        modal.find('.modal-body p').text('Deseja excluir o sala "' + nome + '" ?')
        modal.find('.modal-footer form input').val(id)

    })
</script>