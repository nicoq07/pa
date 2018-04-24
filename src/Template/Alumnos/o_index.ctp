<div class="col-lg-6 col-lg-offset-3 panel panel-info">
	<div class = "col-lg-12 panel-heading">
    	<h3><?= __('Alumnos a mi cargo') ?></h3>
	</div>
	<div class="col-lg-12 panel-body" >
	    <table class= "table table-responsive">
	        <thead>
	            <tr>
	                <th><?= h('Nombre') ?></th>
	                <th><?= h('Acción') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($alumnos as $alumno): ?>
	            <tr>
	                <td><?= $this->Html->link($alumno->presentacion, ['action' => 'oView', $alumno->id]) ?></td>
	           		<td><?= $this->Html->link('Editar', ['action' => 'edit', $alumno->id],['class' => 'btn btn-md btn-info']) ?></td>
	           	
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	   </div>
</div>
