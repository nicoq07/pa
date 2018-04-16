
<div class="col-lg-5 col-lg-offset-2 well">
	<?=  $this->Form->create($alumno);
		echo $this->Form->label('mob', ['label' => 'Mes']);
		echo $this->Form->month('mob', ['empty' => true]);
		echo $this->Form->radio('activos', [false => 'Todos', true => 'Sólo activos']);
	  ?>
	  <?= $this->Form->button(__('Ver')) ?>
    <?= $this->Form->end();  ?>
   
</div>