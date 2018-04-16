
<div class="table-responsive col-lg-8 col-lg-offset-1 well well-sm"> 
<h3><?php echo h("Cumpleaños del mes de $month")?></h3>
    <table class="table table-bordered">
	<thead>
		<tr>
			<th width="30%"><?php echo ("Nombre");?></th>
			<th width="10%"><?php echo ("Día");?></th>
			<th width="20%"><?php echo ("Correo");?></th>
			<th width="20%"><?php echo ("Correo madre");?></th>
			<th width="20%"><?php echo ("Correo padre");?></th>
		</tr>
	</thead>
<tbody>
</tbody>
<?php foreach ($alumnos as $alumno):?>
	<tr>
			<td><?php echo (h($alumno->presentacion));?></td>
			<td><?php echo ($alumno->fecha_nacimiento->format("j"));?></td>
			<td><?php echo (h($alumno->email));?></td>
			<td><?php echo (h($alumno->email_madre));?></td>
			<td><?php echo (h($alumno->email_padre));?></td>
		</tr>
<?php endforeach;?>
</table>
</div>