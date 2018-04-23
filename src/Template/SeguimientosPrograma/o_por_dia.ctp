<div class="col-lg-6 col-lg-offset-3 panel panel-info">
<div class="related">

<div class="col-lg-12">
	<div class="col-lg-6 panel-heading"> 
		<h2><?= h(__($dia))?> </h2>
	</div>
	
	<div class="col-lg-5 panel-group">
		<?php  
		if ($fechas)
		{
		echo $this->Form->create('pPorDia', ['url' => [ 'action' =>  'oPorDia'], 'id' => 'oPorDia', 'type' => 'post']);
		echo $this->Form->control('fechas', ['label' => 'Fecha', 'empty' => true, 'type' => 'select', 'options' => $fechas, 'onchange'=>'document.getElementById("oPorDia").submit()']);
		echo $this->Form->end();
		}
		else {
			?>
			<div class="panel panel-success">
		     	 <div class="panel-heading">
					<h4><?php echo h('Todo al día')?></h4>
				</div>
		    </div>
			<?php 
		}
		?>
	
	</div>
</div>
	<?php foreach ($horarios as $horario){?>
	    <h3><?= h($horario->hora->format('H:i')) ?></h3>
	        <?php if (!empty($horario->clases)): ?>
	        <table class="table">
	        	<?php foreach ($horario->clases as $clase){?>
	            <tr>
	           			<td>
	           				<?php if ($fechas != false) {?>
	           				<?= $this->Html->link($clase->presentacionDisciplina, 
	           						[ 'controller' => 'SeguimientosPrograma', 'action' => 'oCargaMultiple' ,$clase->id,$fecha],['target' => '_blank']) . " (Cant. alumnos:  " . $clase->alumno_count . ")" ?>
	           				<?php } else { ?>
	           				
	           				<?php } ?>
	           			</td>
	            </tr>
	            <?php }?>
	        </table>
	        <?php endif; 
		}	?>
	    </div>
</div>
