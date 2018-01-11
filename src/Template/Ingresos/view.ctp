<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingreso $ingreso
 */
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ingreso
    <small>nombre cliente</small>
  </h1>

</section>

 <!-- Main content -->
<section class="content">
<div class="box">
    <div class="box-body">
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('Cliente') ?></th>
                <td><?= $ingreso->has('cliente') ? $this->Html->link($ingreso->cliente->nombre, ['controller' => 'Clientes', 'action' => 'view', $ingreso->cliente->id]) : '' ?></td>
            </tr>   
            <tr>
                <th scope="row"><?= __('Fecha') ?></th>
                <td><?= h($ingreso->fecha) ?></td>
            </tr>
             
             <tr>
                <th scope="row"><?= __('Medio Pago') ?></th>
                <td><?= h($ingreso->medio_pago) ?></td>
            </tr>      
            <tr>
                <th scope="row"><?= __('Monto') ?></th>
                <td><?= $this->Number->format($ingreso->monto) ?></td>
            </tr>
            
        </table>        
    </div>
</div>

  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Servicios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Tipo Servicio Id') ?></th>
                <th scope="col"><?= __('Ingreso Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ingreso->servicios as $servicios): ?>
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
        </div>
        <!-- /.box-body -->        
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Productos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Ingreso Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ingreso->venta_productos as $ventaProductos): ?>
            <tr>
                <td><?= h($ventaProductos->id) ?></td>
                <td><?= h($ventaProductos->nombre) ?></td>
                <td><?= h($ventaProductos->valor) ?></td>
                <td><?= h($ventaProductos->cantidad) ?></td>
                <td><?= h($ventaProductos->ingreso_id) ?></td>
                <td><?= h($ventaProductos->producto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VentaProductos', 'action' => 'view', $ventaProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VentaProductos', 'action' => 'edit', $ventaProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VentaProductos', 'action' => 'delete', $ventaProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ventaProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.box-body -->        
      </div>
      <!-- /.box -->
    </div>

</div>
