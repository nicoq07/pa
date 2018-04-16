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
	    	 	<?php  echo $this->Html->image('logoIba.png', ['class' => 'pull-right' , 'height' => "150" , 'width' => "150",'fullBase' => true]); ?>
	    		</div>
	</div>
	<div  class="col-lg-6"> 	<h2><strong><?= h("Disciplina: " .$clase->disciplina->descripcion)?></strong></h2> </div>
</div>
<div class="col-lg-12">
	<div  class="col-lg-12"> 	<h2><strong><?= h("Profesor: ". $clase->profesore->presentacion )?></strong></h2> </div>
	<div  class="col-lg-12"> 	<h2><strong><?= h("Seguimiento del alumno : " . $alumno->presentacion  )?></strong></h2> </div>
	
</div>

	
	<table class = "table table-striped">
            <tr>
                <td width="20%" class="tamano-encabezado" scope="col"><?= h("Fecha") ?></td>
                <td width="60%" class="tamano-encabezado" scope="col"><?= h("Observación")?></td>
                <td width="20%" class="tamano-encabezado" scope="col"><?= h("Nota")?></td>
            </tr>
        <tbody>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
            </tr>
            <tr>
                <td class="tamano-tabla" ><?= h($seguimiento->fecha->format('d-m-Y')) ?></td>
                <td class="tamano-tabla"><?= h($seguimiento->observacion) ?></td>
                 <td class="tamano-tabla" ><?= $seguimiento->calificacione ? h($seguimiento->calificacione->nombre ." (".h($seguimiento->calificacione->valor)).")" : "No tiene" ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>





</div>