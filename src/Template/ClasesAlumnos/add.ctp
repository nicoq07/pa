<div class="clasesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($clasesAlumno) ?>
    <fieldset>
        <legend><?= __('Add Clases Alumno') ?></legend>
        <?php
            echo $this->Form->control('alumno_id');
            echo $this->Form->control('clase_id', ['options' => $clases]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
