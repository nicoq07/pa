<div class="col-lg-8 col-lg-offset-2 panel panel-info">
<div class="panel-heading"><h3><?= h("Clases sin alumnos: ")?> </h3></div>
	
	        <table class="table table-inversed">
	            <tr>
	                <th scope="col"><?= __('Disciplina') ?></th>
	                 <th scope="col"><?= __('Operador') ?></th>
	                <th scope="col"><?= __('Día y hora ') ?></th>
	                <th scope="col"><?= __('Acción') ?></th>
	            </tr>
	            <?php foreach ($array as $c){?>
	            <tr>
	           		<td><?= h($c['disci']) ?></td>
	           		<td><?= $this->Html->link($c['operador'],['action' => 'view', $c['operador_id']]) ?></td>
	           		<td><?= h(__($c['nom_dia']) ." " . date("H:i",strtotime($c['hora'] ))) ?></td>
	           		<td><?=  $this->Html->link('Editar',['controller' => 'Clases', 'action' => 'edit', $c['clase_id']],['class' => 'btn-sm btn-warning'])?>
	           		<?= $this->Form->postLink(__('Borrar'), ['controller' => 'Clases','action' => 'delete', $c['clase_id']],['class' => 'btn-sm btn-danger','confirm' => __('Borrar clase ?')]) ?>
	           		
	           		</td>
	            </tr>
	            <?php }?>
	        </table>
	 </div>