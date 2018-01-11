<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio[]|\Cake\Collection\CollectionInterface $servicios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Servicios'), ['controller' => 'TipoServicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Servicio'), ['controller' => 'TipoServicios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingresos'), ['controller' => 'Ingresos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingreso'), ['controller' => 'Ingresos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicios index large-9 medium-8 columns content">
    <h3><?= __('Servicios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_servicio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ingreso_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio): ?>
            <tr>
                <td><?= $this->Number->format($servicio->id) ?></td>
                <td><?= $this->Number->format($servicio->descripcion) ?></td>
                <td><?= $this->Number->format($servicio->valor) ?></td>
                <td><?= $servicio->has('tipo_servicio') ? $this->Html->link($servicio->tipo_servicio->id, ['controller' => 'TipoServicios', 'action' => 'view', $servicio->tipo_servicio->id]) : '' ?></td>
                <td><?= $servicio->has('ingreso') ? $this->Html->link($servicio->ingreso->id, ['controller' => 'Ingresos', 'action' => 'view', $servicio->ingreso->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
