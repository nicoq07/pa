<?= $this->assign('title', 'Mis Seguimientos'); ?>
<div class="col-lg-12 panel panel-info">
	<div class="panel-heading" ><h3 ><?= __('Seguimientos') ?></h3> </div>
  	<?php 
  	 echo $this->element('seguimientosOperadorSearch');
  	?>
  	&nbsp;
    <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
            <tr>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                <th width="20%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="20%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="15%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="15%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosPrograma as $seguimientos): ?>
            <tr>
                <td><?= $this->Html->link($seguimientos->clases_alumno->clase->presentacionCorta, ['controller' => 'Clases', 'action' => 'o_view', $seguimientos->clases_alumno->clase->id])  ?></td>
                <td><?= $this->Html->link($seguimientos->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'o_view', $seguimientos->clases_alumno->alumno->id])  ?></td>
                <td><?= h($seguimientos->presente ) ?></td>
                <td><?= h($seguimientos->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Cargar'), ['action' => 'edit', $seguimientos->id], ['class' => 'btn-sm btn-success']) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientos->id], ['class' => 'btn-sm btn-info']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?=  $this->element('footer')?>
</div>
