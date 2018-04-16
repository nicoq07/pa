<?php $this->assign('title','Informe de pagos');?>
<div class="col-lg-5 col-lg-offset-2 panel">
	<?=  $this->Form->create();
		echo $this->Form->label('mob', ['label' => 'Mes']);
		echo $this->Form->month('mob', ['empty' => true]);
		echo $this->Form->label('year', ['label' => 'Año']);
		echo $this->Form->year('year', [
				'minYear' => 2017,
				'maxYear' => date('Y')
		]);
	  ?>
	  <?= $this->Form->button(__('Ver')) ?>
    <?= $this->Form->end() ?>
</div>