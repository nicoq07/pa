<div class="col-lg-12">
<div style="width: 100%; float:left;">
	<h6> <?= h('Generado: '.date('d-m-Y'))?> </h6>
</div>
<div style="width: 80%;float:left">
	<h1> <?= h('Operador/a: '.$operador->presentacion)?> </h1>
</div>
<div style="width: 20%; float:left;">
	<h3> <?= h('Año: '.date('Y'))?> </h3>
</div>

	<table class="table table-striped">
		<tbody>
			<?php foreach ($presentes as $alumno => $valor) :?>
			<tr>
				<td style="width: 100%">
					<?= h($alumno)?>
				</td>
			</tr>
			<tr>
				<td style="width: 100%">
						<table class="table table-striped table-bordered">
							<!--  Creo los TD de Meses y un nuevo array  -->
							<tr style="height: 30%;">
							<?php $meses = null;?>
								<?php foreach ($valor as $mes => $dia) :?>
								<?php $meses[$mes] = $dia; ?>
    								<td colspan="<?= count($dia)?>" style="font-size: 0.6rem;" class="info text-center">
    									<?= h($mes);  ?>
    								</td>								
								<?php endforeach; ?>
								
							</tr>
							
							<tr style="height: 30%;">
								<?php foreach ($meses as $mes) :?>
									<?php foreach ($mes as $dia => $presente) :?>
    								<td style="font-size: 0.6rem;" class="primary text-center">
    									<?= h($dia);  ?>
    								</td>								
								
									<?php endforeach; ?>
								<?php endforeach; ?>
							</tr>
							
							
							<tr style="height: 40%">
							<?php foreach ($valor as $mes => $dia) :?>
								<?php foreach ($dia as $presente):?>
    								<td style="font-size: 0.7rem;" class="text-center">
    									<?= h($presente);  ?>
    								</td>								
								<?php endforeach; ?>
							<?php endforeach; ?>
							</tr>
							
							
						</table>
				</td>							
			</tr>
		
			<?php  endforeach; ?>
		</tbody>
	</table>
</div>


