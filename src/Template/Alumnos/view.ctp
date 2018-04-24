<div class="well col-lg-10 col-lg-offset-1" style="padding: 0;">
<?= $this->element('menuEnAlumno')?> 
	   <div  style="margin-top:10px" class="row">
		     <div class="col-lg-7">
		     	<span style="font-size:4rem; margin-top:10px"><?= h($alumno->presentacion) ?></span>
		      </div>
		    <div class="col-lg-5">
		    <?php 
		    if (empty($alumno->referencia_foto)) { ?>
		     <div class="col-lg-5  col-lg-offset-5"><p class="separador-ligth" style="font-size:1.20rem;"> NO TIENE FOTO </p></div>
		<?php     }
		
		else {
			$ds  = DS;
			if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				$ds = DS_WINDOWS_IMG;
			}
			echo $this->Html->image('alumnos'. $ds .$alumno->referencia_foto, ['escape' => true ,'title' => $alumno->presentacion ,'alt' => $alumno->presentacion, 'class' => 'pull-right' , 'height' => "200" , 'width' => "200"]); } ?>
		    </div>
		</div>
		<div class="separador"></div>

		<div class="col-lg-1 col-md-1 view-div borde"><?= __('DNI') ?></div>
		<div class="col-lg-5 col-md-5  borde"><?= $alumno->nro_documento ? h($alumno->nro_documento) : h("-") ?></div>
		<div class="col-lg-2 col-md-2 view-div borde"><?= __('Direccion') ?></div>
		<div class="col-lg-4 col-md-4  borde"><?= $alumno->direccion ? h($alumno->direccion) : "-" ?> </div>
<!-- 	1	 -->
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Código Postal') ?></div>
		<div class="col-lg-4 col-md-4  borde "><?=$alumno->codigo_postal ?  h($alumno->codigo_postal) : "-" ?></div>
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Ciudad') ?></div>
		<div class="col-lg-4 col-md-4  borde"><?= $alumno->ciudad ? h($alumno->ciudad) : "-"?> </div>
<!--     2 -->
		<div class="col-lg-1 col-md-1 borde view-div"><?= __('Celular') ?></div>
		<div class="col-lg-5 col-md-5  borde"><?= $alumno->celular ? h($alumno->celular) : "-"?></div>
		<div class="col-lg-1 col-md-1 borde view-div"><?= __('Télefono') ?></div>
		<div class="col-lg-5 col-md-5  borde"><?= $alumno->telefono ? h($alumno->telefono) : "-"?> </div>
<!-- 	3 -->
		<div class="col-lg-3 col-md-3 borde view-div"><?= __('Email') ?></div>
		<div class="col-lg-9 col-md-9  borde"><?= $alumno->email ? h($alumno->email) : "-"?> </div>
<!-- 	4 -->
		<div class="col-lg-4 col-md-4 borde view-div"><?= __('Fecha Nac.') ?></div>
		<div class="col-lg-4 col-md-4  borde"><?= h($alumno->fecha_nacimiento->format('d/m/Y')) ?></div>
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Edad') ?></div>
		<div class="col-lg-2 col-md-2 borde"><?=$alumno->edad ? __($alumno->edad) : __('-');?></div>
<!-- 	5 -->
		<div class="col-lg-3 col-md-2 borde view-div"><?= __('Tutor') ?></div>
		<div class="col-lg-3 col-md-2 borde"><?= $alumno->nombre_madre ? h($alumno->nombre_madre) : "-" ?> </div>
		<div class="col-lg-3 col-md-2 borde view-div"><?= __('Tutor 2') ?></div>
		<div class="col-lg-3 col-md-2 borde"><?= $alumno->nombre_padre ? h($alumno->nombre_padre) : "-" ?> </div>
<!-- 	6-->		
		<div class="col-lg-3 col-md-2 borde view-div"><?= __('Celular tutor') ?></div>
		<div class="col-lg-3 col-md-2 borde"><?=$alumno->celular_madre ? h($alumno->celular_madre) : "-"?> </div>
		<div class="col-lg-3 col-md-2 borde view-div"><?= __('Celular tutor 2') ?></div>
		<div class="col-lg-3 col-md-2 borde"><?=$alumno->celular_padre ? h($alumno->celular_padre) : "-"?> </div>
<!-- 	7-->		
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Email tutor') ?></div>
		<div class="col-lg-4 col-md-4 borde"><?=$alumno->email_madre ? h($alumno->email_madre) : "-" ?> </div>
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Email tutor 2') ?></div>
		<div class="col-lg-4 col-md-4 borde"><?=$alumno->email_padre ? h($alumno->email_padre) : "-" ?> </div>
<!-- 	8-->		
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Colegio') ?></div>
		<div class="col-lg-10 borde"><?= $alumno->colegio ? h($alumno->colegio) : "-"?> </div>
<!--	11-->	
		<div class="col-lg-3 col-md-3 borde view-div"><?= __('Fecha Baja') ?></div>
		<div class="col-lg-3 col-md-3 borde"><?=$alumno->fecha_baja ? h($alumno->fecha_baja->format('d/m/Y')) : "-" ?> </div>
		<div class="col-lg-3 col-md-3 borde view-div"><?= __('Alta') ?></div>
		<div class="col-lg-3 col-md-3  borde"><?= h($alumno->created->format('d/m/Y')) ?> </div>
<!--  12 -->		
		<div class="col-lg-2 col-md-2 borde view-div"><?= __('Modificado') ?></div>
		<div class="col-lg-4 col-md-4  borde"><?= $alumno->modified ? h($alumno->modified->format('d/m/Y')) :"-"  ?> </div>
		<div class="col-lg-3 col-md-3 borde view-div"><?= __('Activo') ?></div>
		<div class="col-lg-3 col-md-3 borde"><?=$alumno->active ? __('Sí') : __('No');?> </div>
	    <div class="col-lg-12 col-md-12">
	        <h4><?= __('Observación') ?></h4>
	       <div class="separador"><?= $this->Text->autoParagraph(h($alumno->observacion)); ?></div>
	    </div>
</div>
	    
	    <div class="related col-lg-10 col-lg-offset-1 panel-danger">
	        <div class="panel-heading">
		   	 <h4><?= __('Clases inscriptas' ) ?></h4>
		    </div>
		    
	        <?php if (!empty($alumno->clases)){ ?>
	         <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
	            <tr>
	                <th width="60%" scope="col"><?= __('Detalle') ?></th>
	                <th scope="col"><?= __('Activa') ?></th>
	                <th width="30%" scope="col" class="actions"><?= __('Actions') ?></th>
	            </tr>
	            </thead>
	            <?php foreach ($alumno->clases as $clases): ?>
	            <tr>
	               
	                <td data-title="Clase"><?= h($clases->presentacion) ?></td>
	                <td data-title="Activa"><?= $clases->active ? h("Sí") : h("No") ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('Ver'), ['controller' => 'Clases', 'action' => 'view', $clases->id],  ['class' => 'btn-sm btn-info']) ?>
	                    <?= $this->Html->link(__('Editar'), ['controller' => 'Clases', 'action' => 'edit', $clases->id],  ['class' => 'btn-sm btn-warning']) ?>
	                 	<?= $this->Html->link(__('Tranferir de Clase'), ['controller' => 'Alumnos', 'action' => 'transferirClase', $alumno->id,$clases->id],  ['class' => 'btn-sm btn-default']) ?>
	                 	<?= $this->Form->postLink(__('Quitar de la clase'),['controller' => 'Clases','action' => 'desactivarClaseAlumno', $alumno->id,$clases->id],['class' => 'btn-sm btn-danger','confirm' => __('Quitar de la clase a {0}?', $alumno->presentacion)]) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	            
	        </table>
	         <?php  }  else {  echo "<strong> ". h("No tiene clases activas") ."</strong> "; }?>
			</div>
	       
	    </div>
	     <div class="related col-lg-10 col-lg-offset-1 panel-warning">
	        	<div class="panel-heading">
			   	 <h4><?= __('Seguimientos de Clases' ) ?></h4>
			    </div>
	        
	        <?php if (!empty($seguimientos)){ ?>
	        <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
	            <tr>
	            	<th width="20%" scope="col"><?= __('Presente') ?></th>
	                <th width="55%" scope="col"><?= __('Observación') ?></th>
	                <th width="15%" scope="col"><?= __('Fecha') ?></th>
	                <th scope="col" width="10%" class="actions"><?= __('Actions') ?></th>
	            </tr>
	            </thead>
	            <?php foreach ($seguimientos as $seguimiento): ?>
	            <tr>
	                <td data-title="Presente"><?= h($seguimiento->presente) ?></td>
	                <td data-title="Observación"><?= h($seguimiento->observacion) ?></td>
	                <td data-title="Fecha"><?= __($seguimiento->fecha->format('l')) .' '. $seguimiento->fecha->format('d-m-Y') ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('Ver'), ['controller' => 'SeguimientosClasesAlumnos', 'action' => 'view', $seguimiento->id],  ['class' => 'btn-sm btn-info']) ?>
	                    <?= $this->Html->link(__('Editar'), ['controller' => 'SeguimientosClasesAlumnos', 'action' => 'edit', $seguimiento->id],  ['class' => 'btn-sm btn-warning']) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </table>
	        </div>
	       	        <?php  }  else { echo "<strong> ". h("El alumno no ha asistido a ninguna clase todavía") ."</strong> "; }?>
	       
	    </div>
	