<?php  function getCodigo($tipo = null)
{
if ($tipo == null)
{
    return '0';
}
else {
    $pos = strpos($tipo, '.');
    $codigo = substr($tipo,  0,$pos);
    return $codigo;
}
}
getCodigo(FERIADO);

?>
	<div class="pull-left">
		<span><?php echo "Generada: ". date('d-m-Y') ?></span>
	</div>
<div class="div-fragmento-dia">
	<div class="div-dia-horario">
		<h4 class="text-dia-horaio">
			<?= h($operador->presentacion ." - ". $mes . " de ". date('Y') )?>
		 </h4>
	</div>
		<small style="font-size: 15px; ">
			<?php echo "Referencias: <b>1</b>: Presente Activo. <b>2</b>: Presente Pasivo. <b>3</b>: Ausente Sin Aviso. <b>4</b>: Ausente Con Aviso. <b>5</b>: No Corresponde. <b>99</b>: FERIADO.";?>
		 </small>

	
	<?php $tamanio =  null;
	$diaActual = null;
	$flag = true;
	$numDia = 0;
	$aux = null;
// 	debug(count($dias)); exit;
// 	foreach ($arrayClases as $clases) {
	while ($clases = current($arrayClases)) {
		?>
		
		
		 <?php 
		if ($flag || ($diaActual != key($arrayClases)) ) {
			$numDia = 0;
			$aux = array();
			foreach ($dias as $dia)
			{
				
				if (key($arrayClases) == key($dia))
				{
					
					array_push($aux,($dia[key($dia)]));
					$numDia++;
				}
			}
			if ($numDia > 0) {$tamanio = (30/$numDia);} else { $tamanio=30;}
			$flag = false;
			?>
			
			<div class="dia page-break">
			
			<div  style="margin-top: 10px"  class="div-fila">
				<div class="div-texto-cabeza-alumno" style="">
					<p class="p-nom-dia">	<?= "<strong>".  h( __(key($arrayClases))) . "</strong>"; ?> </p>
				</div>
					<?php foreach ($dias as $dia) {
						if (key($arrayClases) == key($dia)) {
						?>
						<div  style="height:40px; width: <?php print "$tamanio%"?>" class="div-dia-cabeza">
								   <p class="p-num-dia">	<?= "<strong>". h($dia[key($arrayClases)]) ."</strong>"?>  </p>
						</div>
					<?php } ?>
				<?php 	}?>
			</div>
		<?php 	}?>
		
				<?php 
		//foreach ($clases as $clase)
		//$primerHora = date("H:i",strtotime($clases[0]['hora']));
		for ($j =0; $j <count($clases); $j++)
		{
			
			if ($j == 0)
			{
				$hora = date("H:i",strtotime($clases[$j]['hora']));
				?>
				<div  class="div-fila">
					<div class= "div-alumno" style="width: 100%;float: left;">
						<p class="p-nom-hora"> &nbsp; </p>
					</div>
					<div class= "div-alumno" style="width: 100%;float: left;">
						<p class="p-nom-hora"> <?= "<strong>".h($hora)."</strong>"?>  </p>
					</div>
				</div >
				<?php 
			}
			elseif (($j != 0) && ($hora != date("H:i",strtotime($clases[$j-1]['hora']))))			
			{
				?>
				<div  class="div-fila">
					<div class= "div-alumno" style="width: 100%;float: left;">
						<p class="p-nom-hora"> &nbsp;  </p>
					</div>
					<div class= "div-alumno" style="width: 100%;float: left;">
						<p class="p-nom-hora"> <?= "<strong>".h($hora)."</strong>"?>  </p>
					</div>
				</div >
				<?php 
			}
		?>
			<!-- DIV ALUMNO -->
			<div  class="div-fila">
				<div class= "div-alumno" style="width: 70%;float: left;">
					<p class="p-alumno"> <?="<strong>". h($clases[$j]['alumno']. ' ') ."</strong>". h($clases[$j]['disci']) . ' con ' . h($clases[$j]['profesor']) ?>  </p>
				</div>
				<?php 
				$presente = null;
				$x = 0;
				for($i = 0; $i < $numDia; $i++ )
				{
					$presente = ' ';
					
					reset($arrayPresentes);
					while($alumno= current($arrayPresentes))
						{
							if ($clases[$j]['clasealumno_id'] == key($arrayPresentes))
							{	
								if (!empty($alumno[$i+$x]))
								{
									if ($alumno[$i+$x]['fecha'] == $aux[$i])
									{
										if ($alumno[$i+$x]['presente'])
										{
										    $presente = getCodigo($alumno[$i+$x]['presente']);
											next($arrayPresentes);
											break;
										}
										elseif (($alumno[$i+$x]['creada'] == $alumno[$i+$x]['modificada']))
										{
											$presente = ' ';
											next($arrayPresentes);
											break;
										}
										
									}
								}
								if (count($alumno) < count($aux))
								{
									switch (count($alumno))
									{
										case 1:
											$x = 1 - $numDia;
											break;
										case 2:
											$x = 2 - $numDia;
											break;
										case 3:
											$x = 3 - $numDia;
											break;
										case 4:
											$x = 4 - $numDia;
											break;
									}
								}
								
									
							}
							next($arrayPresentes);
							
						}
						
						
					?>
					<div style="width: <?php print "$tamanio%"?>"  class="div-dia">
						 <p class="p-num-dia"> <?php echo h($presente)?>	 </p>
					</div>
					<?php 
				}
// 				exit;
				?>
			</div >
			<!-- DIV ALUMNO -->
			<?php 
			$sig =next($clases);
			//debug($sig);
			$hora = date("H:i",strtotime($sig['hora']));
		}
	next($arrayClases);
	$diaActual != key($arrayClases);
	?>
	</div> <?php
	};
	?> <!-- WHILE ITEM-->
	
</div>
