<div class="col-lg-6 col-lg-offset-3 panel">
	<h3>
  		<?= h("¿Qué planilla necesitás?") ?>
   </h3>
	<div class="col-lg-12">
		<div class="col-lg-4 col-lg-offset-2">
		          <?= $this->Html->link('Listado de presentes',['action' => '' ],['class' => 'btn-lg btn-success pull-left','target' => '_blank' ]) ?>
		</div>
		<div class="col-lg-4">
		         <?= $this->Html->link('Listado de cursos',['action' => 'planillaCursos' ],['class' => 'btn-lg btn-info pull-right','target' => '_blank']) ?>
		</div>
	</div>	   
   
</div>


