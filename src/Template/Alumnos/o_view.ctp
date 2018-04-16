<div class="well col-lg-8" style="padding: 0;">
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5">
	     	<span style="font-size:3.50rem; margin-top:10px"><?= h($alumno->presentacion) ?></span>
	      </div>
	    <div class="col-lg-7">
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
		echo $this->Html->image('alumnos'. $ds .$alumno->referencia_foto, ['escape' => true ,'title' => $alumno->presentacion ,'alt' => $alumno->presentacion, 'class' => 'pull-right' , 'height' => "250" , 'width' => "250"]); } ?>
	    </div>
	</div>
	<div class="separador"></div>
	
	<div class="col-lg-3 col-md-3 borde view-div"><?= __('Adolescencia') ?></div>
	<div class="col-lg-3 col-md-3 borde"><?= $alumno->programa_adolecencia ? __('Sí') : __('No'); ?> </div>
	<div class="col-lg-3 col-md-3 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-3 col-md-3 borde"><?=$alumno->active ? __('Sí') : __('No');?> </div>
	
    <div class="related separador-ligth">
        <h4> <?= __('Clases inscriptas' ) ?></h4>
        <?php if (!empty($alumno->clases)){ ?>
        <table class="table table-striped">
            <tr>
                <th width="60%" scope="col"><?= __('Detalle') ?></th>
                <th scope="col"><?= __('Activa') ?></th>
            </tr>
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
               
                <td><?= h($clases->presentacion) ?></td>
                <td><?= $clases->active ? h("Sí") : h("No") ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php  }  else { echo h("NO TIENE CLASES ACTIVAS"); }?>
    </div>
    
     <div class="related separador-ligth">
        <h4><?= __('Seguimientos de Clases' ) ?></h4>
        <?php if (!empty($seguimientos)){ ?>
        <table class="table table-striped">
            <tr>
                <th width="55%" scope="col"><?= __('Observación') ?></th>
                <th width="10%" scope="col"><?= __('Presente') ?></th>
                 <th width="20%" scope="col"><?= __('Fecha') ?></th>
            </tr>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
               
                <td><?= h($seguimiento->observacion) ?></td>
                <td><?= $seguimiento->presente ? h("Sí") : h("No") ?></td>
                <td><?= __($seguimiento->fecha->format('l')) .' '. $seguimiento->fecha->format('d-m-Y') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php  }  else { echo h("NO TIENE SEGUIMIENTOS ACTIVOS"); }?>
    </div>
    
</div>
