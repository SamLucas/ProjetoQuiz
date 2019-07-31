<div id="headerwrap" style="margin-top:-50px">
    <div class="container">
        <main>

            <div class="content">
                <!-- Pieces Slider -->
                <div class="pieces-slider">
                    <!-- Each slide with corresponding image and text -->
                    <div class="pieces-slider__slide">
                        <img class="pieces-slider__image" src="assets/img/1.jpg" alt="">
                        <h2 class="pieces-slider__text">Status Quo</h2>
                    </div>
                    <div class="pieces-slider__slide">
                        <img src="./assets/img/logo4.png" class="pieces-slider__image">
                        <h2 class="pieces-slider__text">Status 2</h2>
                    </div>
                    <div class="pieces-slider__slide">
                        <img class="pieces-slider__image" src="./assets/img/2.jpg" alt="">
                        <h2 class="pieces-slider__text">Amphibia</h2>
                    </div>
                    <div class="pieces-slider__slide">
                        <img class="pieces-slider__image" src="./assets/img/3.jpg" alt="">
                        <h2 class="pieces-slider__text">Love Letters</h2>
                    </div>
                    <div class="pieces-slider__slide">
                        <img class="pieces-slider__image" src="./assets/img/4.jpg" alt="">
                        <h2 class="pieces-slider__text">Green Flight</h2>
                    </div>
                    <div class="pieces-slider__slide">
                        <img class="pieces-slider__image" src="./assets/img/5.jpg" alt="">
                        <h2 class="pieces-slider__text">Fun Fun Run</h2>
                    </div>
                    <!-- Canvas to draw the pieces -->
                    <canvas class="pieces-slider__canvas"></canvas>
                    <!-- Slider buttons: prev and next -->
                    <button class="pieces-slider__button pieces-slider__button--prev">prev</button>
                    <button class="pieces-slider__button pieces-slider__button--next">next</button>
                </div>
            </div>
        </main>
    </div>
    <!-- /container -->
</div>
<!-- /headerwrap -->

<div id="service">
    <div class="container">
        <div class="row centered">
            <div class="col-md-4">
                <i class="fa fa-heart-o"></i>
                <h4>Handsomely Crafted</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p><br/><a href="#" class="btn btn-theme">More Info</a></p>
            </div>
            <div class="col-md-4">
                <i class="fa fa-flask"></i>
                <h4>Retina Ready</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p><br/><a href="#" class="btn btn-theme">More Info</a></p>
            </div>
            <div class="col-md-4">
                <i class="fa fa-trophy"></i>
                <h4>Quality Theme</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p><br/><a href="#" class="btn btn-theme">More Info</a></p>
            </div>
        </div>
    </div>
    <! --/container -->
</div>
<! --/service -->

<!-- *****************************************************************************************************************
	 QUIZES
	 ***************************************************************************************************************** -->
     <!-- *****************************************************************************************************************
     QUIZES
     ***************************************************************************************************************** -->
     <div id="portfoliowrap">
        <h3>Quizes Disponiveis</h3>
        <div class="portfolio-centered">
            <div class="recentitems portfolio">
                <!--
                <?php 
                
                $con = new mysqli("localhost", "root", "", "wda_crud");
                
                $res = $con->query("SELECT * FROM imagens i INNER JOIN produtos p WHERE p.id = i.id_produto AND i.tipo = 1");
                
                foreach($res as $r):
                    
                    ?>
                -->
                <div class="portfolio-item graphic-design" style="background-color:<?php echo $r['cor'];?>;">
                    <div class="he-wrap tpl6" style="height:202px">
                        <img src="<?php echo $r['caminho'];?>" width="200px" alt="">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown"><?php echo $r['descricao'];?></h3>
                                <a data-rel="prettyPhoto" href="<?php echo $r['caminho'];?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                            </div><!-- he bg -->
                        </div><!-- he view -->      
                    </div><!-- he wrap -->
                </div>
                    <!--
                    
                <?php endforeach;?>

            -->
            
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_09.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_09.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item web-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_02.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Web Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_02.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_03.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_03.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_04.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_04.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item books">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_05.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Book Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_05.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_06.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_06.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item books">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_07.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Book Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_07.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_08.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_08.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item web-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_01.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Web Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_01.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
            <div class="portfolio-item books">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/portfolio_10.jpg" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">A Book Design Item</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_10.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->      
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            
        </div><!-- portfolio -->
    </div><!-- portfolio container -->
</div><!--/Portfoliowrap -->


