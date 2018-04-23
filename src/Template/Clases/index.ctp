<div class="col-lg-8 col-lg-offset-2 well">
    <h3><?= __('Clases') ?></h3>
    <?php echo $this->element('filtroAnioActual'); ?>
    <div class="col-lg-3 col-lg-offset-9">
    	  <?= $this->Html->link(__('Nueva'), ['action' => 'add'],['class' => 'btn btn-success']) ?>
    </div>
    <div class='col-lg-12'>
     &nbsp;
    </div>
    <?php echo $this->Form->create('frmBusqueda',['id' => 'frmBusqueda','url' => ['action' => 'index']]);?>
	    <div class='col-lg-12'>
	    	<div class='col-lg-4'>
	    		 <?php echo $this->Form->input('operadores',['type' => 'select', 'empty' => 'Operador/a','onchange' => 'document.getElementById("frmBusqueda").submit(); ']); ?>
	    	</div>
	    	<div class='col-lg-4'>
	    		 <?php echo $this->Form->input('profesores',['type' => 'select', 'empty' => 'Profesor/a','onchange' => 'document.getElementById("frmBusqueda").submit(); ']); ?>
	    	</div>
	    	<div class='col-lg-2'>
	    		 <?php echo $this->Form->input('disciplinas',['type' => 'select','empty' => 'Disciplinas','onchange' => 'document.getElementById("frmBusqueda").submit(); ']); ?>
	    	</div>
	    	<div class='col-lg-2'>
	    		 <?php echo $this->Form->input('horarios',['type' => 'select','empty' => 'Horarios','onchange' => 'document.getElementById("frmBusqueda").submit(); ']); ?>
	    	</div>
	    </div>
   	<?php echo $this->Form->end();?>
   
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="30%" scope="col"><?= $this->Paginator->sort('Detalle') ?></th>
                <th width="30%" scope="col"><?= $this->Paginator->sort('Operador') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('alumno_count',['label' => 'Cant. A']) ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('active',['label' => 'Activa']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td  ><?= h($clase->presentacion) ?></td>
                <td  ><?= h($clase->operadore->presentacion) ?></td>
                <td  ><?= h($clase->alumno_count) ?></td>
                <td ><?= $clase->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $clase->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $clase->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $clase->id],['class' => 'btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <?= $this->element('footer') ?>
</div>