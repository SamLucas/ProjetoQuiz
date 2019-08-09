<div id="blue">
	<div class="container">
		<div class="row" style="text-align:center">
			<h3><?= $dados_quiz['quiz_nome'] ?></h3>
		</div>
	</div>
</div>

<style>
	.bloking { display: block; }
	.no-bloking { display: none; }
</style>

<link rel="stylesheet" href="<?php echo base_url('conf/Frontend/css/sllep.css') ?>">

<div class="container">
	<div class="w3-content w3-display-container">
		<?php $s = 1; foreach($perguntas as $perg): ?>
		<div class="row mySlides">
			<div class="col-sm-6"> <?= $s++?>/<?=sizeof($perguntas)?>
			</div>
			<div class="col-sm-6">
				<span class="coins"></span>
				<div class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Dicas
						<!-- <span class="caret"></span> -->
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a onclick="eliminar('<?php echo $perg->perg_accepted; ?>',<?= $perg->perg_id; ?>);">
							Eliminar duas opções <span class="coins">40</span></a>
						</li>
						<li><a onclick="resp('<?php echo $perg->perg_accepted; ?>',<?= $perg->perg_id; ?>);">Mostrar a resposta<span>70</span></a>
						</li>
						<li><a onclick="dicas(<?= $perg->perg_id; ?>);">Dica do Professor <span>40</span></a></li>
					</ul>                
				</div>
				
			</div>
			<div class="col-sm-12" style="margin-top: 20px;">
				<div class="text-center" style="margin-top: 10px;margin-bottom: 50px;"><?= $perg->perg_descricao; ?></div>
				<div class="quiz" id="<?= $perg->perg_id; ?>" data-toggle="buttons">
					<div class="row">
						<label class="element-animation1 btn btn-lg btn-warning btn-block" style="display: none;"></label>
						<div class="col-sm-6 space">
							<label class="element-animation1 btn btn-lg btn-info btn-block">
								<span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<input type="radio" name="q_answer" value="Primeira opção" style="display: none;">
								<?= $perg->perg_op1;?>
							</label>
						</div>
						<div class="col-sm-6 space">
							<label class="element-animation2 btn btn-lg btn-info btn-block">
								<span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<input type="radio" name="q_answer" value="Segunda opção" style="display: none;">
								<?= $perg->perg_op2;?>
							</label>
						</div>
						<div class="col-sm-6 space">
							<label class="element-animation3 btn btn-lg btn-info btn-block">
								<span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<input type="radio" name="q_answer" value="Terceira opção" style="display: none;">
								<?= $perg->perg_op3;?>
							</label>
						</div>
						<div class="col-sm-6 space">
							<label class="element-animation4 btn btn-lg btn-info btn-block">
								<span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<input type="radio" name="q_answer" value="Quarta opção" style="display: none;">
								<?= $perg->perg_op4;?>
							</label>
						</div>
					</div>
					<div class="dica" style="display: none;"><?php echo $perg->perg_dica; ?></div>
				</div>
			</div>	



			<div>
				<div class="resposta"><input type="text" class="resposta2" name="resposta" style="display: none;"></div>
				<button class="btn btn-lg btn-info pull-right" style="margin: 20px;"  onclick="envia($('.resposta2').val(),<?= $dados_quiz['quiz_id']?>,<?=$perg->perg_id?>);plusDivs(1);destiva();">Proximo</button>
			</div>
		</div>
	<?php endforeach; ?>

	<div class="row mySlides">
		<div class="col-sm-12">
			<div class="text-center" style="margin-top: 10px;margin-bottom: 50px;">
				<h2>Quiz Finalizado!!</h2>
				<div class="row">
					<div class="col-sm-4">
						<h1 id="pontuacao"></h1>
						<p>Sua pontuação</p>
					</div>
					<div class="col-sm-4"><p>Premio Recebido</p></div>
					<div class="col-sm-4"><p>Acertos</p></div>
				</div>
				<div class="row" style="margin-top: 50px;">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<a class="col-sm-12 btn btn-lg btn-info pull-right" href="<?= base_url('index.php/Front_Quiz') ?>">Voltar</a>
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>

	function dicas(id){

		$.ajax({
			url: '<?= base_url('index.php/Front_Quiz/dica3'); ?>',
			type: 'html',
			success: function (e) {

				var header = document.getElementsByClassName("quiz");
				for (var i = 0; i < header.length; i++) {
					if(header[i].getAttribute('id') == id){
						var d = header[i].getElementsByClassName('dica');
					    d[0].style.display = 'block';
					}
				}

				$('.navbar #moedas').text(<?= $this->session->userdata('moedas') ?>-40);
			},
			error: function (e, exception) {
		        var msg = '';
		        if (e.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (e.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (e.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + e.responseText;
		        }
		    
				alert('Não foi possível comprar a dica!'+ msg);
		    }
			
		});		
	}

	function desativa(){
		$('button:submit').attr('disabled', true);
	}

	function resp(str,id){
		$.ajax({
			url: '<?= base_url('index.php/Front_Quiz/dica2'); ?>',
			type: 'html',
			success: function (e) {
				var ans = 0;
				if("Primeira opção" == str) ans = 1;
				if("Segunda opção" == str) ans = 2;
				if("Terceira opção" == str) ans = 3;
				if("Quarta opção" == str) ans = 4;

				var header = document.getElementsByClassName("quiz");
				for (var i = 0; i < header.length; i++) {
					if(header[i].getAttribute('id') == id){
						var btns = header[i].getElementsByClassName("btn");
						for (var d = 0; d < btns.length; d++) {
							if(d != ans) btns[d].setAttribute("disabled","disabled");
						}
					}
				}

				$('.navbar #moedas').text(<?= $this->session->userdata('moedas') ?>-70);
			},
			error: function (e, exception) {
		        var msg = '';
		        if (e.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (e.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (e.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + e.responseText;
		        }
		    
				alert('Não foi possível comprar a dica!'+ msg);
		    }
			
		});		

		
	}

	function eliminar(str,id){

		$.ajax({
			url: '<?= base_url('index.php/Front_Quiz/dica1'); ?>',
			type: 'html',
			success: function (e) {
				var ans = 0;
				if("Primeira opção" == str) ans = 1;
				if("Segunda opção" == str) ans = 2;
				if("Terceira opção" == str) ans = 3;
				if("Quarta opção" == str) ans = 4;

				var a = 0;
				while(true){
					if(a != ans && a != 0) break;
					a = Math.floor(Math.random() * 10)%5;
				}

				var b = 0;
				while(true){
					if(b != ans && b != 0 && b != a) break;
					b = Math.floor(Math.random() * 10)%4;
				}

				var header = document.getElementsByClassName("quiz");
				for (var i = 0; i < header.length; i++) {
					if(header[i].getAttribute('id') == id){
						var btns = header[i].getElementsByClassName("btn");
						for (var d = 0; d < btns.length; d++) {
							if(d == a || d == b) btns[d].setAttribute("disabled","disabled");
						}
					}
				}

				$('.navbar #moedas').text(<?= $this->session->userdata('moedas') ?>-40);
			},
			error: function (e, exception) {
		        var msg = '';
		        if (e.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (e.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (e.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + e.responseText;
		        }
		    
				alert('Não foi possível comprar a dica!'+ msg);
		    }
			
		});		
	}

		

	$("label.btn").on('click',function () {
		var choice = $(this).find('input:radio').val();
		$('.resposta input:text').attr('value',choice);
		$('button:submit').prop('disabled', false);
	});
	
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {
			slideIndex = 1
		}    
		if (n < 1) {
			slideIndex = x.length
		}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		x[slideIndex-1].style.display = "block";  
	}

	function envia(a,b,c){
		$.post('<?= base_url('index.php/Front_Quiz/resposta'); ?>', {resposta: a,id_quiz: b,id_pergunta: c}, function(data){
			document.getElementById("pontos").innerText  = data;
            // alert(data);
        });
	}
</script>