<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoProducto $tipoProducto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Producto'), ['action' => 'edit', $tipoProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Producto'), ['action' => 'delete', $tipoProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoProductos view large-9 medium-8 columns content">
    <h3><?= h($tipoProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tipoProducto->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoProducto->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($tipoProducto->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Productos') ?></h4>
        <?php if (!empty($tipoProducto->productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Valor Compra') ?></th>
                <th scope="col"><?= __('Valor Venta') ?></th>
                <th scope="col"><?= __('Stock') ?></th>
                <th scope="col"><?= __('Alerta Stock') ?></th>
                <th scope="col"><?= __('Tipo Producto Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoProducto->productos as $productos): ?>
            <tr>
                <td><?= h($productos->id) ?></td>
                <td><?= h($productos->nombre) ?></td>
                <td><?= h($productos->valor_compra) ?></td>
                <td><?= h($productos->valor_venta) ?></td>
                <td><?= h($productos->stock) ?></td>
                <td><?= h($productos->alerta_stock) ?></td>
                <td><?= h($productos->tipo_producto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Productos', 'action' => 'view', $productos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Productos', 'action' => 'edit', $productos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Productos', 'action' => 'delete', $productos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
