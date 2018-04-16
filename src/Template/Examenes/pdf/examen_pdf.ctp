<div class = "A5">
	<div  class="div-cabecera-examen">
		<div class="div-titulo-examen">
			<p class="texto-infoiba-examen" > <?php echo h("Registro de Enseñanza - Aprendizaje")?></p>
		</div >
		<div class="div-infoiba-examen">
	    	 	<?php  echo $this->Html->image('logoIba.png', ['height' => "100px" , 'width' => "100px",'fullBase' => true]); ?>
			<p class="texto-infoiba-examen" "> <?php echo h("Instituto Buenos Aires")?></p>
			<p class="texto-infoiba-examen" "> <?php echo h("Escuela de Música - Centro de perfeccionamiento Docente")?></p>
			<p class="texto-infoiba-examen" "> <?php echo h("Dir. Profesor Hugo Castro")?></p>
				 &nbsp;
			<div style="width:100%;">
				<p class="texto-infoiba-examen"> <strong> <?php echo h($examen->periodo)?> </strong></p>
				
			</div >
		</div>
		
	</div>
	<div  class="div-pie-examen">
			<div class="div-alumno-examen">
			<p align="center" class="texto-negrita "> <?php echo h("Alumno: ".$examen->clases_alumno->alumno->presentacion . " en ". $examen->clases_alumno->clase->disciplina->descripcion)?></p>
			</div>
			 &nbsp;
			<div class="div-calificacion-examen">
				<div class="div-puntos-examen" >
					<p class="texto-puntos-examen"> <?php echo h("Instrumento/Canto:")?></p>
					<p class="texto-puntos-examen"> <?php echo h("Lenguaje Musical:")?></p>
				<p class="texto-puntos-examen"> <?php echo h("Práctica de Conjunto:")?></p>
				<p class="texto-puntos-examen"> <?php echo h("Trabajos Prácticos:")?></p>
			</div>
			<div class="div-puntos-examen" >
				<p class="texto-puntos-examen"> <?php echo  $examen->calificacion ? h($examen->calificacion) : h("-")?></p>
				<p class="texto-puntos-examen"> <?php echo  $examen->audioperceptiva?  h($examen->audioperceptiva) : h("-")?></p>
				<p class="texto-puntos-examen"> <?php echo $examen->practica_ensamble? h($examen->practica_ensamble) : h("-")?></p>
				<p class="texto-puntos-examen"> <?php echo $examen->trabajos_practicos?  h($examen->trabajos_practicos) : h("-")?></p>
			</div>
			
		</div>
			</div>
	
	
	
</div>