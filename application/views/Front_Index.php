<?php $caminho = base_url('conf/Frontend'); ?>
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-xs-12" style="margin-top:50px">
                    <h2 class="welcome">BEM VINDO A PLATAFORMA</h2>
                    <h1>GEEK <span class="letterred">MATH</span>!</h1>
                    <h2 style="color: white">QUIZ MUNDO DA <span class="letterred">MATEMÁTICA</span></h2>
                    <h4>Estudar nunca foi tão divertido!</h4> 
                </div>
                <div class="col-xm-0 col-sm-1"></div>
                <div class="col-sm-6 col-xs-12"> 
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item active"> 
                                <img src="<?php echo $caminho; ?>\img\logo4.png" style="max-width:100%; max-height:400px" class="img-responsive" />
                            </div>
                            <div class="item"> 
                                <img src="<?php echo $caminho; ?>\img\contato.png" style="max-width:100%; max-height:400px; border-radius: 10px" class="img-responsive" />  
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><a href="<?php echo base_url('index.php/Front_Contato') ?>"><button type="button" class="btn btn-primary">DÚVIDAS</button></a></h5>
                                    <p style="font-size: 30px;color:white">Entre em contato conosco</p>
                                </div>
                            </div>
                            <div class="item"> <img src="<?php echo $caminho; ?>\img\moeda.png" style="max-width:100%; max-height:400px" class="img-responsive" />  </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /headerwrap -->
    <div id="service">
        <div class="container">
            <div class="row centered">
                <div class="hidden-xs col-sm-3">
                    <img src="<?php echo $caminho; ?>\img\DIGIT_01C.png" width="100%"/>
                </div>
                <div class="col-xs-4 col-sm-3"> <i class="fa fa-heart-o"></i>
                    <h4>Conteúdos</h4>
                    <p>Testes seus conhecimentos no geek Math e se prepare para os testes de Matemática. Registre para participar e ainda dipute  com seus clegas!</p>
                    <p>
                        <br/><a href="<?php echo base_url('index.php/Back_Home') ?>" class="btn btn-theme">Registrar</a></p>
                </div>
                <div class="col-xs-4 col-sm-3"> 
                    <img src="<?php echo $caminho; ?>\img\pontuacao.png" width="150px">
                    <h4>Pontuação</h4>
                    <p>Os pontos são adiquiridos ao se realizar os quizzes! Quanto mais melhor! Realize os quizzes com bastante atenção, quanto mais acertos mais pontos você conquista e melhores posições no Rank!</p>
                    <p>
                        <br/><a href="<?php echo base_url('index.php/Front_Quiz') ?>" class="btn btn-theme">Quizzes</a></p>
                </div>
                <div class="col-xs-4 col-sm-3"> <i class="fa fa-trophy"></i>
                    <h4>Rank</h4>
                    <p>Veja no Rank sua colocação e as dos seus colegas! Lembre-se que quanto mais participação na plataforma mais chances de adiquirir pontuação e subir no Rank.</p>
                    <p>
                        <br/><a href="<?php echo base_url('index.php/Front_Rank') ?>" class="btn btn-theme">Rank</a></p>
                </div>
            </div>
        </div>
        <! --/container -->
    </div>
    <! --/service -->
    <!-- *****************************************************************************************************************
	 TESTIMONIALS
	 ***************************************************************************************************************** -->
    <div id="twrap">
        <div class="container centered">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2"> <i class="fa fa-comment-o"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <h4><br/>Marcel Newman</h4>
                    <p>WEB DESIGNER - BLACKTIE.CO</p>
                </div>
            </div>
            <! --/row -->
        </div>
        <! --/container -->
    </div>
    <! --/twrap -->