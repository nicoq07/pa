<?= $this->assign('title', 'Seguimientos');?>
<div class="col-lg-8 col-lg-offset-1 panel">
<div class="row">
	<h3><?= __('Seguimientos') ?></h3> 
  	<?php echo $this->element('seguimientosSearch');?>
  	 &nbsp;
   <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
            <tr>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                 <th width="20%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="20%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClasesAlumnos as $seguimientosClasesAlumno): ?>
            <tr>
                <td data-title="Clase"><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->clase->presentacion, ['controller' => 'Clases', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->clase->id])  ?></td>
                <td data-title="Alumno"><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $seguimientosClasesAlumno->clases_alumno->alumno->id])  ?></td>
                <td data-title="Presente"><?= $seguimientosClasesAlumno->presente ? h('Sí') : h("No") ?></td>
                <td data-title="Fecha"><?= h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Cargar'), ['action' => 'edit', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-danger','confirm' => __('Borrar el seguimiento # {0}?', $seguimientosClasesAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     </div>
    <?=  $this->element('footer')?>
   </div>
</div>
