<div id="blue">
	<div class="container">
		<div class="row" style="text-align:center">
			<h3>Perfil</h3>
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /blue -->

<div class="container mtb">
	<div class="row" style="text-align: center;">

		<table class="table table-hover">
			<thead>
				<tr>
					<td>NOME</td>
					<td>PROFESSOR</td>
					<td>STATUS</td>
				</tr>
			</thead>
			<tbody>

				<?php foreach($quiz as $qz): ?>
				<tr>
					<td onclick="location.href = 'Front_Quiz/view_quiz?id='+<?= $qz->quiz_id ?>" style="cursor: pointer;"><?= $qz->quiz_nome?></td>
					<td onclick="location.href = 'Front_Quiz/view_quiz?id='+<?= $qz->quiz_id ?>" style="cursor: pointer;"><?= $qz->prof_nome?></td>
					<td>Aberto</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>