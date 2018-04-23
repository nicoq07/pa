<div class="col-lg-6 col-lg-offset-3 panel panel-info">
<div class="panel-heading">
	<h2><?= h(__(date('l')))?> </h2>
	<h4><?= h($mensaje)?>  </h4>
</div>
	<?php foreach ($horarios as $horario){?>
	    <h3><?= h($horario->hora->format('H:i')) ?></h3>
	        <?php if (!empty($horario->_matchingData['Clases'])): ?>
	        <table class="table">
	            <tr>
	           			<td><?= $this->Html->link($horario->_matchingData['Clases']->presentacionDisciplina, [ 'controller' => 'Clases', 'action' => 'oView', $horario->_matchingData['Clases']->id])?></td>
	            </tr>
	        </table>
	        <?php endif; 
		}	?>
</div>
