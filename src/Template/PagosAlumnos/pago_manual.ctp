<head>
<script type="text/javascript">
 
function addConcepto()
{
		 var originalConcepto=document.getElementById("div-concepto");
		 var nuevoConcepto=originalConcepto.cloneNode(true);
		 destino=document.getElementById("campos_dinamicos");
		 destino.appendChild(nuevoConcepto);
 
		 var originalMonto=document.getElementById("div-monto");
		 var nuevoMonto=originalMonto.cloneNode(true);
		 destino=document.getElementById("campos_dinamicos");
		 destino.appendChild(nuevoMonto);
}
 
 
</script>
</head>
<div class="col-lg-6 col-lg-offset-2 well well-sm">
    <?= $this->Form->create($pagosAlumno) ?>
    <fieldset>
        <legend><?= __('Nuevo pago manual') ?></legend>
        <?php
        echo $this->Form->month('mes',['type' => 'mob', 'empty' => false]);
        
        if (!$alumno)
        {
        	echo $this->Form->control('alumno_id', ['options' => $alumnos]);
        }
        else
        {  echo $this->Form->hidden('alumno_id', [ 'value' => $alumno->id]); ?>
        	<h3> <?= h("Pago de ". $alumno->presentacion) ?></h3>
       <?php  }?>
        <div class="col-lg-12" id="campos_dinamicos" >
       		<div class="col-lg-8" id="div-concepto" >   <?php  echo $this->Form->control('concepto[]',['label' => 'Concepto']); ?> </div>
       		<div class="col-lg-3" id="div-monto" >   <?php  echo $this->Form->control('monto[]',['label' => 'Monto']); ?> </div>
       		<div class="col-lg-1" id="div-add" > 	<input type="button" class="btn-sm btn-info" id="btnAdd" value="+" onclick="addConcepto();" /></div>
         </div>
            
        <?= $this->Form->button(__('Generar e Imprimir'),['class' => 'btn-md btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>
