<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio $servicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicio'), ['action' => 'edit', $servicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicio'), ['action' => 'delete', $servicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Servicios'), ['controller' => 'TipoServicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Servicio'), ['controller' => 'TipoServicios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ingresos'), ['controller' => 'Ingresos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingreso'), ['controller' => 'Ingresos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicios view large-9 medium-8 columns content">
    <h3><?= h($servicio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo Servicio') ?></th>
            <td><?= $servicio->has('tipo_servicio') ? $this->Html->link($servicio->tipo_servicio->id, ['controller' => 'TipoServicios', 'action' => 'view', $servicio->tipo_servicio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ingreso') ?></th>
            <td><?= $servicio->has('ingreso') ? $this->Html->link($servicio->ingreso->id, ['controller' => 'Ingresos', 'action' => 'view', $servicio->ingreso->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= $this->Number->format($servicio->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($servicio->valor) ?></td>
        </tr>
    </table>
</div>
