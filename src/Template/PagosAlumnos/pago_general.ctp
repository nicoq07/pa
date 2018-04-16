<div class="col-lg-6 col-lg-offset-2 well well-sm">
    <?= $this->Form->create($pagosAlumnos) ?>
    <fieldset>
        <legend><?= __('Nuevo pago general') ?></legend>
        <?php
        echo $this->Form->label('tienepago', ['label' => 'No volver a cobrar']);
        echo $this->Form->checkbox('tienepago');
      
        ?>
        <div class="col-lg-12 separador">
           <span>
        	  	<?php echo h("Sí el alumno tiene generado un pago en el mes y no quiere volver a genera otro,   marque 'No volver a cobrar' ")?>
           </span>
        </div>
       <?php
      		 echo $this->Form->label('mes',['label' => 'Mes']);
     		 echo $this->Form->month('mes',['type' => 'mob', 'empty' => false]);
      ?> 
	  <?php $mes = __(date('F')) ?>
        <div class="col-lg-12" id="campos_dinamicos" >
       		<div class="col-lg-10" id="div-concepto" >   <?php  echo $this->Form->control('concepto',['label' => 'Concepto', 'value' => "Enseñanza correspondiente al mes de $mes"]); ?> </div>
         </div>
          
        <?= $this->Form->button(__('Generar e Imprimir'),['class' => 'btn-md btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>