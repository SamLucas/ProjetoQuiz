<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Quiz</h4>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!--col -->
            <div class="white-box">

                <form action="<?php echo base_url('index.php/Back_Quiz') ?>/cadastrar" method="post" >
                    <div class="form-group">
                        <label for="name">Nome do Quiz:</label>
                        <input type="text" class="form-control" id="name" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="editor">Descricao:</label>
                        <textarea name="descricao" id="descricao" rows="10" cols="80">
                            This is my textarea to be replaced with CKEditor.
                        </textarea>
                        <script>CKEDITOR.replace( 'descricao' );</script>
                    </div>

                    <button type="submit" class="btn btn-success m-1-20 btn-outline btn-rounded">Salvar</button>
                    <a href="<?php echo base_url('index.php/Back_Quiz') ?>" class="btn btn-danger m-1-20 btn-outline btn-rounded" >Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</div>
