<?= $this->assign('title', 'Pagos de alumnos');?>
<div class="col-lg-10 well">
    <h3><?= __('Pagos Alumnos') ?></h3>
    <div class = "col-lg-10 separador">
    <?php 	
    if($this->request->session()->read('search_key') != "")
    {
    	$search_key = $this->request->session()->read('search_key');
    }
    else
    {
    	$search_key = "";
    }
    echo $this->Form->create('search', ['id' => 'frmIndex', 'url' => ['action' => 'search']]); ?>
	<div class ="col-lg-12">
	<div class="col-lg-3 "> 
		 <?php
			echo $this->Form->label('Búsqueda :');
			echo $this->Form->control('palabra_clave', ['value' =>$search_key,'label' => false,'placeholder' => 'Nombre o DNI ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
	<div class="col-lg-3 " > 
		 <?php
            echo $this->Form->label('Período');
            echo $this->Form->month('mes', ['type' => 'mob', 'label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	</div>
	<div class="col-lg-3" > 
	  		  <?php
	  		  echo $this->Form->label('Año');
	  		  echo $this->Form->year('year',['onchange'=>'document.getElementById("frmIndex").submit()']);
	          ?>
	  </div>
	  <div class ="col-lg-2">
		  <?php
            echo $this->Form->label('Deudores');
            $check = null;
            //             if ($this->request->session()->read('conditions'))
//             {
//           	  $check = "checked";
//             }
            echo $this->Form->checkbox('deuda', ['label' => false, $check,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
        </div>
      </div>	
	<?php echo $this->Form->end(); ?>
	</div>
    <table >
        <thead>
            <tr>
                <th width="20%" scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('created',['label' => 'Generado']) ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('mes',['label' => 'Período']) ?></th>
                <th  width="10%" scope="col"><?= $this->Paginator->sort('fecha_pagado',['label' => 'Fecha pagado']) ?></th>
                <th  width="10%" scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th width="7%" scope="col"><?= $this->Paginator->sort('pagado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id',['label' => 'Recibido por']) ?></th>
                <th width="25%" scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosAlumnos as $pagosAlumno): ?>
            <tr >
                <td><?= $pagosAlumno->has('alumno') ? $this->Html->link($pagosAlumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'view', $pagosAlumno->alumno->id]) : '' ?></td>
                <td><?= h($pagosAlumno->created->format('d-m-Y')) ?></td>
                 <td><?= h(__(date('F',strtotime("01-".$pagosAlumno->mes."-2000")))); ?></td>
                <td><?= $pagosAlumno->fecha_pagado ? h($pagosAlumno->fecha_pagado->format('d-m-Y')) : h("Sin datos")?></td>
                <td title="Detalles:&#10;<?php foreach ($pagosAlumno->pagos_conceptos as $pc) { echo "-". $pc->detalles . "&#10;"; }?>" align="center" ><?= $this->Number->format($pagosAlumno->monto) ?></td>
                <td><?= $pagosAlumno->pagado ? h("Sí") : h("No") ?></td>
                <td><?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->nombre, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $pagosAlumno->pagado ? h("")  : $this->Form->postLink(__('Pagar'), ['action' => 'pagar', $pagosAlumno->id], ['class' => 'btn-sm btn-success','confirm' => __('Marcar como pago?', $pagosAlumno->id)])?>
                    <?= $this->Html->link(__('Reimprimir'), ['action' => 'pagoManualPdf', $pagosAlumno->id, '_ext' => 'pdf'],['class' => 'btn-sm btn-info','target' => '_blank']) ?>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $pagosAlumno->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $pagosAlumno->id], ['class' => 'btn-sm btn-danger','confirm' => __('Eliminar el pago?', $pagosAlumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <?= $this->element('footer'); ?>
</div>
