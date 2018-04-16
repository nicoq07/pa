<div class="col-lg-10">
	<div class = "col-lg-5 col-lg-offset-2 panel">
    	<h3><?= __('Alumnos en mis clases') ?></h3>
	</div>
	<div class="col-lg-5 col-lg-offset-2 panel" >
	    <table class= "table table-striped">
	        <thead>
	            <tr>
	                <th  width="70%"><?= h('Nombre') ?></th>
	                <th width="30%" ><?= h('Programa Adolecencia') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($alumnos as $alumno): ?>
	            <tr>
	                <td><?= $this->Html->link($alumno->presentacion, ['action' => 'oView', $alumno->id]) ?></td>
	                <td><?=$alumno->programa_adolecencia? h("Sí") : h("No") ?></td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	   </div>
</div>
