<div class="col-lg-6 col-lg-offset-2 panel panel-default">
	<div class = "col-lg-12 separador">
		<div class="col-lg-12 panel-heading">
		    <h3><?= h("Pago de ". __(h(date('F', strtotime(date('Y')."-".$pagosAlumno->mes."-01")))) ." de : " . $pagosAlumno->alumno->presentacion) ?></h3>
		</div>
		<div class="col-lg-10">
			<?= __('Recibido por:') ?>
			<?= $pagosAlumno->has('user') ? $this->Html->link($pagosAlumno->user->presentacion, ['controller' => 'Users', 'action' => 'view', $pagosAlumno->user->id]) : '' ?>
		</div>
		<div class="col-lg-10">
			<?= __('Código:') ?>
			<?= $this->Number->format($pagosAlumno->id) ?>
		</div>
		<div class="col-lg-10">
			<?= __('Fecha generado:') ?>
			<?= h($pagosAlumno->created->format('d/m/Y')) ?>
		</div>
		<div class="col-lg-10">
			<?= __('Fecha pagado: ') ?>
			<?= $pagosAlumno->fecha_pagado ? h($pagosAlumno->fecha_pagado->format('d/m/Y')) : h("Sin datos") ?>
		</div>
		<div class="col-lg-10">
			<?= __('Monto:') ?>
			<?= $pagosAlumno->monto ? $pagosAlumno->monto : __('No'); ?>
		</div>
		<div class="col-lg-10">
			<?= __('Pagado:') ?>
			<?= $pagosAlumno->pagado ? __('Sí') : __('No'); ?>
		</div>
	</div>
</div>
