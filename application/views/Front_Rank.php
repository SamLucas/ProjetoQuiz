<div id="blue">
	<div class="container">
		<div class="row" style="text-align:center">
			<h3>Rank</h3>
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /blue -->

<div class="container mtb">
	<div class="row" style="text-align: center;">

		<table class="table table-hover">
			<thead>
				<tr>
					<td>CÓDIGO</td>
					<td>NOME</td>
					<td>PONTOS</td>
				</tr>
			</thead>
			<tbody>

				<?php 	
					foreach ($alunos as $a):
				 ?>
				<tr>
					<td><?=$a->alun_cod?></td>
					<td><?=$a->alun_nome?></td>
					<td><?=$a->alun_point?></td>
				</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>