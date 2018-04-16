<div class="container col-lg-10">
<div class="col-lg-6 col-lg-offset-2 well">
<div class="related">
	<h2><?= h(__(date('l')))?> </h2>
	<?php foreach ($horarios as $horario){?>
	    <h3><?= h($horario->hora->format('H:i')) ?></h3>
	        <?php if (!empty($horario->_matchingData['Clases'])): ?>
	        <table class="table">
	            <tr>
	           			<td><?= $this->Html->link($horario->_matchingData['Clases']->presentacionDisciplina, [ 'controller' => 'Clases', 'action' => 'pView', $horario->_matchingData['Clases']->id])?></td>
	            </tr>
	        </table>
	        <?php endif; 
		}	?>
	    </div>
</div>
</div>
