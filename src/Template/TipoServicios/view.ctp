<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoServicio $tipoServicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Servicio'), ['action' => 'edit', $tipoServicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Servicio'), ['action' => 'delete', $tipoServicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoServicio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Servicios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Servicio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoServicios view large-9 medium-8 columns content">
    <h3><?= h($tipoServicio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tipoServicio->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoServicio->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($tipoServicio->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Servicios') ?></h4>
        <?php if (!empty($tipoServicio->servicios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Tipo Servicio Id') ?></th>
                <th scope="col"><?= __('Ingreso Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoServicio->servicios as $servicios): ?>
            <tr>
                <td><?= h($servicios->id) ?></td>
                <td><?= h($servicios->descripcion) ?></td>
                <td><?= h($servicios->valor) ?></td>
                <td><?= h($servicios->tipo_servicio_id) ?></td>
                <td><?= h($servicios->ingreso_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicios', 'action' => 'view', $servicios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicios', 'action' => 'edit', $servicios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicios', 'action' => 'delete', $servicios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
