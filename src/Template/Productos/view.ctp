<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gasto $gasto
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Gastos    
  </h1>

</section>

 <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">               
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="vertical-table">
                        <tr>
                            <th scope="row"><?= __('Nombre') ?></th>
                            <td><?= h($producto->nombre) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Tipo Producto') ?></th>
                            <td><?= $producto->has('tipo_producto') ? $this->Html->link($producto->tipo_producto->nombre, ['controller' => 'TipoProductos', 'action' => 'view', $producto->tipo_producto->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($producto->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Valor Compra') ?></th>
                            <td><?= $this->Number->format($producto->valor_compra) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Valor Venta') ?></th>
                            <td><?= $this->Number->format($producto->valor_venta) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Stock') ?></th>
                            <td><?= $this->Number->format($producto->stock) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Alerta Stock') ?></th>
                            <td><?= $this->Number->format($producto->alerta_stock) ?></td>
                        </tr>
                    </table>   
                </div>
        <!-- /.box-body -->        
            </div>
      <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Productos vendidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>                
                    <th scope="col"><?= __('Nombre') ?></th>
                    <th scope="col"><?= __('Valor') ?></th>
                    <th scope="col"><?= __('Cantidad') ?></th>
                    <th scope="col"><?= __('Ingreso Id') ?></th>
                    <th scope="col"><?= __('Producto Id') ?></th>                
                </tr>
                <?php foreach ($producto->venta_productos as $ventaProductos): ?>
                <tr>                
                    <td><?= h($ventaProductos->nombre) ?></td>
                    <td><?= h($ventaProductos->valor) ?></td>
                    <td><?= h($ventaProductos->cantidad) ?></td>
                    <td><?= h($ventaProductos->ingreso_id) ?></td>
                    <td><?= h($ventaProductos->producto_id) ?></td>                
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->        
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>

