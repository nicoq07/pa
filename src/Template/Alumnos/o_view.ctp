<div class="well col-lg-8 col-lg-offset-2 panel panel-info" >
   <div  style="margin-top:10px" class="row">
	     <div class="col-lg-5 panel-heading">
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
	
	<div class="col-lg-3 col-md-3 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-3 col-md-3 borde"><?=$alumno->active ? __('Sí') : __('No');?> </div>
	
    <div class="col-lg-12 panel-body">
        <h4> <?= __('Clases inscriptas' ) ?></h4>
        <?php if (!empty($alumno->clases)){ ?>
        <table class="table table-striped">
            <tr>
                <th width="60%" scope="col"><?= __('Detalle') ?></th>
            </tr>
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
               
                <td><?= h($clases->presentacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php  }  else { echo h("NO TIENE CLASES ACTIVAS"); }?>
    </div>
    
     <div class="panel-body">
        <h4><?= __('Seguimientos de Clases' ) ?></h4>
        <?php if (!empty($seguimientos)){ ?>
        <table class="table table-striped">
            <tr>
                <th width="25%" scope="col"><?= __('Presente') ?></th>
                <th width="55%" scope="col"><?= __('Observación') ?></th>
                 <th width="20%" scope="col"><?= __('Fecha') ?></th>
            </tr>
            <?php foreach ($seguimientos as $seguimiento): ?>
            <tr>
               
                <td><?= h($seguimiento->presente); ?></td>
                <td><?= h($seguimiento->observacion) ?></td>
                <td><?= __($seguimiento->fecha->format('l')) .' '. $seguimiento->fecha->format('d-m-Y') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php  }  else { echo h("NO TIENE SEGUIMIENTOS ACTIVOS"); }?>
    </div>
    
</div>
