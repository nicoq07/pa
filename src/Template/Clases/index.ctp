<div class="col-lg-8 col-lg-offset-1 well">
    <h3><?= __('Clases') ?></h3>
    <div class="col-lg-12">
    	<div class="col-lg-1 col-lg-offset-8">
    	  <?= $this->Html->link(__('IBA'), ['action' => 'addIba'],['class' => 'btn btn-success']) ?>
    </div>
    <div class="col-lg-1">
    	  <?= $this->Html->link(__('PA'), ['action' => 'addPrograma'],['class' => 'btn btn-info']) ?>
    </div>
    &nbsp;
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Detalle') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('alumno_count',['label' => 'Cant. A']) ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('programa_adolescencia',['label' => 'Programa']) ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('active',['label' => 'Activa']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td  ><?= h($clase->presentacion) ?></td>
                <td  ><?= h($clase->alumno_count) ?></td>
                <td ><?= $clase->programa_adolescencia ? h("Sí") : h("No") ?></td>
                <td ><?= $clase->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $clase->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $clase->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $clase->id],['class' => 'btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <?= $this->element('footer') ?>
</div>

