 <style>
 	.tamano-titulo
 	{
 	font-size: 3rem;
 	}
 	
 	.tamano-encabezado
 	{
 	font-size: 1.5rem;
 	}
 	
 	.tamano-tabla
 	{
 	font-size: 1rem;
 	}
 	
 
 </style>
 <div class="col-lg-2 col-lg-offset-9">
		<?php echo "Generado el " .date('d-m-y');?>
</div> 
<div class="col-lg-12">

<div  class="col-lg-12 div-logo-externa">
				<div>
	    	 	<?php  echo $this->Html->image(LOGO, ['class' => 'pull-right' , 'height' => "150" , 'width' => "150",'fullBase' => true]); ?>
	    		</div>
	</div>
	<div class="col-lg-12 tamano-titulo">
		<?php echo "Informe general de Seguimientos";?>
	</div>
</div>
&nbsp;
	
	<table class = "table table-striped">
            <tr>
                <td width="auto" class="tamano-encabezado" scope="col"><?= h("Alumno") ?></td>
                <td width="auto" class="tamano-encabezado" scope="col"><?= h("Fecha: ") ?></td>
                <td width="70%" class="tamano-encabezado" scope="col"><?= h("Observación")?></td>
            </tr>
        <tbody>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
          		<td width="auto" class="tamano-tabla" ><?= h($seguimiento->clases_alumno->alumno->presentacion) ?></td>
                <td width="auto" class="tamano-tabla" ><?= h($seguimiento->fecha->format('d-m-Y')) ?></td>
                <td width="70%" class="tamano-tabla"><?= h($seguimiento->observacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
