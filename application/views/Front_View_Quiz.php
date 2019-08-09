<div id="blue">
	<div class="container">
		<div class="row" style="text-align:center">
			<h3><?= $dados_quiz['quiz_nome'] ?></h3>
		</div>
	</div> 
</div>

<div class="container mtb">
	<div class="row" style="text-align: center;">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<p><?= $dados_quiz['quiz_descricao'] ?></p>
			<i>Professor: <?php echo $dados_quiz['prof_nome'] ?></i>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-12" style="margin-top: 20px;">
			<a class="btn btn-primary" href="perguntas?id=<?php echo $dados_quiz['quiz_id']; ?>">Iniciar</a>
		</div>

	</div>
</div>