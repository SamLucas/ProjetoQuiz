<?php $caminho = base_url('conf/Frontend'); ?>

<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>Sobre</h4>
                <div class="hline-w"></div>
                <p>Este é um Quiz educacional desenvolvido por alunos cursando o 3º período em Ciência da Computação.</p>
            </div>
            <div class="col-lg-4">
                <h4>Links Sociais</h4>
                <div class="hline-w"></div>
                <p>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="<?= base_url('index.php/Back_Home') ?>"><i class="fa fa-dribbble"></i></a>
                    <a href="http://muz.ifsuldeminas.edu.br/" target="_blank"><img src="<?= $caminho; ?>/img/if.png" style="width: 35px;height: 35px; margin-top:-13px;margin-left: -5px;"></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Localização</h4>
                <div class="hline-w"></div>
                <p>
                    Muzambinho,<br/>
                    Minas Gerais,<br/>
                    Brasil.<br/>
                </p>
            </div>

        </div>
    </div>
</div>

<!-- <script src='<?php echo $caminho; ?>/js/anime.min.js'></script>
<script src='<?php echo $caminho; ?>/js/pieces.min.js'></script>
<script src='<?php echo $caminho; ?>/js/demo.js'></script> -->

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="<?php echo $caminho; ?>/js/custom.js"></script>
    
    
    <script src="<?php echo $caminho; ?>/js/retina-1.1.0.js"></script>
    <script src="<?php echo $caminho; ?>/js/jquery.hoverdir.js"></script>
    <script src="<?php echo $caminho; ?>/js/jquery.hoverex.min.js"></script>
    <script src="<?php echo $caminho; ?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo $caminho; ?>/js/jquery.isotope.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    
<script>
// Portfolio
(function($) {
    "use strict";
    var $container = $('.portfolio'),
    $items = $container.find('.portfolio-item'),
    portfolioLayout = 'fitRows';

    if ($container.hasClass('portfolio-centered')) {
        portfolioLayout = 'masonry';
    }

    $container.isotope({
        filter: '*',
        animationEngine: 'best-available',
        layoutMode: portfolioLayout,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        },
        masonry: {}
    }, refreshWaypoints());

    function refreshWaypoints() {
        setTimeout(function() {}, 1000);
    }

    $('nav.portfolio-filter ul a').on('click', function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        }, refreshWaypoints());
        $('nav.portfolio-filter ul a').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    function getColumnNumber() {
        var winWidth = $(window).width(),
        columnNumber = 1;

        if (winWidth > 1200) {
            columnNumber = 5;
        } else if (winWidth > 950) {
            columnNumber = 4;
        } else if (winWidth > 600) {
            columnNumber = 3;
        } else if (winWidth > 400) {
            columnNumber = 2;
        } else if (winWidth > 250) {
            columnNumber = 1;
        }
        return columnNumber;
    }

    function setColumns() {
        var winWidth = $(window).width(),
        columnNumber = getColumnNumber(),
        itemWidth = Math.floor(winWidth / columnNumber);

        $container.find('.portfolio-item').each(function() {
            $(this).css({
                width: itemWidth + 'px'
            });
        });
    }

    function setPortfolio() {
        setColumns();
        $container.isotope('reLayout');
    }

    $container.imagesLoaded(function() {
        setPortfolio();
    });

    $(window).on('resize', function() {
        setPortfolio();
    });
})(jQuery);

</script>

</body>
</html>
