<?= $this->assign('title', 'Seguimientos Programa Adolescencia');?>
<div class="col-lg-12  panel panel-info">
	<div class='col-lg-12  panel-heading'><h3><?= __('Seguimientos Programa Adolescencia') ?></h3> </div>
   <?php  echo $this->element('seguimientosSearch'); ?>	
  	 &nbsp;
   <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
            <tr>
            	 <th width="20%" scope="col"><?= h('Operador') ?></th>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                 <th width="20%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="20%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="15%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosPrograma as $seguimientos): ?>
            <tr>
            	<td data-title="Operador"><?= $this->Html->link($seguimientos->clases_alumno->clase->operadore->presentacion, ['controller' => 'Operadores', 'action' => 'view', $seguimientos->clases_alumno->clase->operadore->id])  ?></td>
                <td data-title="Clase"><?= $this->Html->link($seguimientos->clases_alumno->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientos->clases_alumno->clase->id])  ?></td>
                <td data-title="Alumno"><?= $this->Html->link($seguimientos->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientos->clases_alumno->alumno->id])  ?></td>
                <td data-title="Presente"><?=h( $seguimientos->presente ) ?></td>
                <td data-title="Fecha"><?= h($seguimientos->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientos->id], ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Cargar'), ['action' => 'edit', $seguimientos->id], ['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientos->id], ['class' => 'btn-sm btn-danger','confirm' => __('Borrar el seguimiento # {0}?', $seguimientos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     </div>
    <?=  $this->element('footer')?>
</div>
