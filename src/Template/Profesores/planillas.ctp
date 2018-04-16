<div class="col-lg-10">
<div class="col-lg-4 col-lg-offset-3">
	<fieldset>
  		<legend><?= h("¿Qué planilla necesitás?") ?></legend>
   </fieldset>
 </div>

<div class="col-lg-12 ">
	<div class="col-lg-3 col-lg-offset-2">
	          <?= $this->Html->link('Listado de presentes',['action' => '' ],['class' => 'btn-lg btn-success pull-left','target' => '_blank' ]) ?>
	</div>
	<div class="col-lg-3">
	         <?= $this->Html->link('Listado de cursos',['action' => 'planillaCursos' ],['class' => 'btn-lg btn-info pull-right','target' => '_blank']) ?>
	</div>
</div>	
</div>