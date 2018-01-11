<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $servicio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Servicios'), ['controller' => 'TipoServicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Servicio'), ['controller' => 'TipoServicios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingresos'), ['controller' => 'Ingresos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingreso'), ['controller' => 'Ingresos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicios form large-9 medium-8 columns content">
    <?= $this->Form->create($servicio) ?>
    <fieldset>
        <legend><?= __('Edit Servicio') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('valor');
            echo $this->Form->control('tipo_servicio_id', ['options' => $tipoServicios]);
            echo $this->Form->control('ingreso_id', ['options' => $ingresos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
