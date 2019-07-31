<?php $caminho = base_url('index.php/Back_Perguntas') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Perguntas</h4>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!--col -->
            <div class="white-box">

                <form action="<?php  echo base_url('index.php/Back_Perguntas/cadastrar');?>" method="post">

                    <div class="form-group">
                        <label for="editor">Descricao:</label>
                        <textarea name="descricao" id="descricao" rows="10" cols="80"></textarea>
                        <script>CKEDITOR.replace('descricao', {
                            toolbarGroups: [
                            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
                            { name: 'links', groups: [ 'links' ] },
                            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                            { name: 'styles', groups: [ 'styles' ] },
                            { name: 'colors', groups: [ 'colors' ] },
                            { name: 'insert', groups: [ 'insert' ] }
                            ]
                        });</script>
                    </div>
                    <div class="form-group">
                        <label for="primeira">Primeira opção:</label>
                        <textarea name="primeira" id="Primeira" >
                            
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="segunda">Segunda opção:</label>
                        <textarea name="segunda" id="segunda">
                           
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="terceira">Terceira opção:</label>
                        <textarea name="terceira" id="terceira">
                           
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="qurta">Quarta opção:</label>
                        <textarea name="quarta" id="quarta">
                           
                        </textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="dica">Dicas:</label>
                        <textarea name="dica" id="dica" rows="10" cols="10">
                            
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="accepted">Selecione a opção correta:</label>
                        <select class="form-control row b-none" name="accepted">
                            <option>Primeira opção</option>
                            <option>Segunda opção</option>
                            <option>Terceira opção</option>
                            <option>Quarda opção</option>
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="dificuldade">Selecione a dificuldade da pergunta</label>
                        <input type='range' value='' min="0" max='10' name="dificuldade" id="dificuldade" oninput="altera(this.value)" onchange="altera(this.value)">
                        <span id="textranger"></span>  
                    </div>

                    <script>

                        CKEDITOR.replace( 'primeira' , {
                            toolbarGroups: [
                            { name: 'clipboard', groups: [ 'clipboard' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'basicstyles', groups: [ 'basicstyles'] },
                            { name: 'colors', groups: [ 'colors' ] }
                            ],
                            coreStyles_bold : { element : 'b' },
                            height: 80,
                            expand : false,
                            enterMode: CKEDITOR.ENTER_P,
                            shiftEnterMode  : CKEDITOR.ENTER_BR
                        });

                        CKEDITOR.replace( 'segunda' , {
                            toolbarGroups: [
                            { name: 'clipboard', groups: [ 'clipboard' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'basicstyles', groups: [ 'basicstyles'] },
                            { name: 'colors', groups: [ 'colors' ] }
                            ],
                            coreStyles_bold : { element : 'b' },
                            height: 80,
                            expand : false,
                            enterMode: CKEDITOR.ENTER_P,
                            shiftEnterMode  : CKEDITOR.ENTER_BR
                        });

                        CKEDITOR.replace( 'terceira' , {
                            toolbarGroups: [
                            { name: 'clipboard', groups: [ 'clipboard' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'basicstyles', groups: [ 'basicstyles'] },
                            { name: 'colors', groups: [ 'colors' ] }
                            ],
                            coreStyles_bold : { element : 'b' },
                            height: 80,
                            expand : false,
                            enterMode: CKEDITOR.ENTER_P,
                            shiftEnterMode  : CKEDITOR.ENTER_BR
                        });

                        CKEDITOR.replace( 'quarta' , {
                            toolbarGroups: [
                            { name: 'clipboard', groups: [ 'clipboard' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'basicstyles', groups: [ 'basicstyles'] },
                            { name: 'colors', groups: [ 'colors' ] }
                            ],
                            coreStyles_bold : { element : 'b' },
                            height: 80,
                            expand : false,
                            enterMode: CKEDITOR.ENTER_P,
                            shiftEnterMode  : CKEDITOR.ENTER_BR
                        });


                        CKEDITOR.replace( 'dica' , {
                            toolbarGroups: [
                            { name: 'clipboard', groups: [ 'clipboard' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'basicstyles', groups: [ 'basicstyles'] },
                            { name: 'colors', groups: [ 'colors' ] }
                            ],
                            coreStyles_bold : { element : 'b' },
                            height: 80,
                            expand : false,
                            enterMode: CKEDITOR.ENTER_P,
                            shiftEnterMode  : CKEDITOR.ENTER_BR
                        });

                    </script>

                    <script>
                        function altera(valor){
                            document.getElementById('textranger').innerHTML = valor;
                        }
                    </script>

                    <button type="submit" class="btn btn-success m-1-20 btn-outline btn-rounded">Salvar</button>
                    <a href="<?= $caminho?>" class="btn btn-danger m-1-20 btn-outline btn-rounded">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>