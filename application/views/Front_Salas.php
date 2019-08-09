<div id="blue">
	<div class="container">
		<div class="row" style="text-align:center">
			<h3>Salas</h3>
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /blue -->

<div class="container mtb">

	<div class="row hline">
		
		<div class="col-lg-4">
			<ul class="nav flex-column">
				<li><a href="">Salas</a></li>
				<li><a href="">Minhas Salas</a></li>
			</ul>
		</div>

		<div class="col-lg-8">
			<table class="table table-hover">
				<thead>
					<tr>
						<td>NOME</td>
						<td>NIVEL</td>
						<td>ALUNOS</td>
						<td>AÇÃO</td>
					</tr>
				</thead>
				<tbody>
					<?php if($salas != null)
					foreach($salas as $dad): ?>
					<tr>
						<td><?php echo $dad->sala_nome ?></td>
						<td>45</td>
						<td>20</td>
						<td>
							<a href="<?php echo base_url('index.php/Back_Salas/sair'); ?>?id=<?= $dad->sala_id;?>" class="btn btn_danger btn-outline btn-rouded">Sair</a>
						</td>
					</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>