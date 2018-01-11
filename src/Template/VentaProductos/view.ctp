<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VentaProducto $ventaProducto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venta Producto'), ['action' => 'edit', $ventaProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venta Producto'), ['action' => 'delete', $ventaProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ventaProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venta Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venta Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ingresos'), ['controller' => 'Ingresos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingreso'), ['controller' => 'Ingresos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ventaProductos view large-9 medium-8 columns content">
    <h3><?= h($ventaProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($ventaProducto->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ingreso') ?></th>
            <td><?= $ventaProducto->has('ingreso') ? $this->Html->link($ventaProducto->ingreso->id, ['controller' => 'Ingresos', 'action' => 'view', $ventaProducto->ingreso->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Producto') ?></th>
            <td><?= $ventaProducto->has('producto') ? $this->Html->link($ventaProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $ventaProducto->producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ventaProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($ventaProducto->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($ventaProducto->cantidad) ?></td>
        </tr>
    </table>
</div>
