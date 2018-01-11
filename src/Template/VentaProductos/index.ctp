<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VentaProducto[]|\Cake\Collection\CollectionInterface $ventaProductos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venta Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingresos'), ['controller' => 'Ingresos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingreso'), ['controller' => 'Ingresos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ventaProductos index large-9 medium-8 columns content">
    <h3><?= __('Venta Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ingreso_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventaProductos as $ventaProducto): ?>
            <tr>
                <td><?= $this->Number->format($ventaProducto->id) ?></td>
                <td><?= h($ventaProducto->nombre) ?></td>
                <td><?= $this->Number->format($ventaProducto->valor) ?></td>
                <td><?= $this->Number->format($ventaProducto->cantidad) ?></td>
                <td><?= $ventaProducto->has('ingreso') ? $this->Html->link($ventaProducto->ingreso->id, ['controller' => 'Ingresos', 'action' => 'view', $ventaProducto->ingreso->id]) : '' ?></td>
                <td><?= $ventaProducto->has('producto') ? $this->Html->link($ventaProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $ventaProducto->producto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ventaProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ventaProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ventaProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ventaProducto->id)]) ?>
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
