<div class="col-lg-12">
	
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
						<table>
						
							<tr style="height: 50%;">
								<?php foreach ($valor as $dia => $presente) :?>

								<td style="font-size: 0.7rem;">
									<?= h($dia);  ?>
								</td>								
								
								<?php endforeach; ?>
							</tr>
							
							<tr style="height: 50%">
							
							<?php foreach ($valor as $dia => $presente) :?>

								<td style="font-size: 0.7rem;">
									<?= h($presente);  ?>
								</td>								
								
								<?php endforeach; ?>
							
							</tr>
						
						</table>
					

				</td>							
			</tr>
		
			<?php  endforeach; ?>
		</tbody>
	
	</table>
	
		
</div>


