<div class="col-lg-6 col-lg-offset-3 panel panel-info">
	&nbsp;
    <h3 class="panel panel-heading" ><?= h($clase->presentacion) ?></h3>
    &nbsp;
    <div class="related">
    	<div class="row">
       		<div class="col-lg-6"> <h4><?= __('Alumnos en esta clase:') ?></h4> </div>
        </div>
        <?php if (!empty($clase->alumnos)): ?>
        <table class = "table table-striped">
            <tr>
                <th width="60%" scope="col"><?= __('Nombre') ?></th>
                <th width="20%" scope="col"><?= __('Acción') ?></th>
            </tr>
            <?php foreach ($clase->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->presentacion) ?></td>
                <td> <?= $this->Html->link(__('Cargar'), ['controller' => 'SeguimientosPrograma', 'action' => 'addProfesor',$alumnos->_joinData->id],['class' => 'btn-sm btn-info']) ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
