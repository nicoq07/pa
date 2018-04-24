 <style>
 	.tamano-titulo
 	{
 	font-size: 4rem;
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
<div class="col-lg-12">
<div  class="col-lg-12 div-logo-externa">
				<div>
	    	 	<?php  echo $this->Html->image(LOGO, ['class' => 'pull-right' , 'height' => "150" , 'width' => "150",'fullBase' => true]); ?>
	    		</div>
	</div>
	<div  class="col-lg-6"> 	<h2><strong><?= h("Disciplina: " .$clase->disciplina->descripcion)?></strong></h2> </div>
</div>
<div class="col-lg-12">
	<div  class="col-lg-12"> 	<h2><strong><?= h("Operador: ". $clase->operadore->presentacion )?></strong></h2> </div>
	<div  class="col-lg-12"> 	<h3><strong><?= h("Profesor: ". $clase->profesore->presentacion )?></strong></h3> </div>
	<div  class="col-lg-12"> 	<h3><strong><?= h("Seguimiento del alumno : " . $alumno->presentacion  )?></strong></h3> </div>
	
</div>

	
	<table class = "table table-striped">
            <tr>
                <td width="12%" class="tamano-encabezado" scope="col"><?= h("Fecha") ?></td>
                <td width="30%" class="tamano-encabezado" scope="col"><?= h("Presente: ") ?></td>
                <td width="58%" class="tamano-encabezado" scope="col"><?= h("Observación")?></td>
            </tr>
        <tbody>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
            </tr>
            <tr>
                <td class="tamano-tabla" ><?= h($seguimiento->fecha->format('d-m-Y')) ?></td>
                <td class="tamano-tabla" ><?= h($seguimiento->presente) ?></td>
                <td class="tamano-tabla"><?= h($seguimiento->observacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
