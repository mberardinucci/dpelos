<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $productos
 */
?>
<section class="content-header">
      <h1>
        Inventario
        <small>Listado de productos</small>
      </h1>      
</section>


    <!-- Main content -->
    <section class="content">      
      <!-- Default box -->
      <div class="box">
        
        <div class="box-body">
            <?= $this->Html->link(__('Registrar producto', true), array('action' => 'add'), array('class' => 'btn btn-primary btn-lg')); ?> 
            <p>             
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_compra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_venta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alerta_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_producto_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $this->Number->format($producto->id) ?></td>
                <td><?= h($producto->nombre) ?></td>
                <td><?= $this->Number->format($producto->valor_compra) ?></td>
                <td><?= $this->Number->format($producto->valor_venta) ?></td>
                <td><?= $this->Number->format($producto->stock) ?></td>
                <td><?= $this->Number->format($producto->alerta_stock) ?></td>
                <td><?= $producto->has('tipo_producto') ? $this->Html->link($producto->tipo_producto->nombre, ['controller' => 'TipoProductos', 'action' => 'view', $producto->tipo_producto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver', true), array('action' => 'view', $producto->id), array('class' => 'btn btn-info')); ?>
                        <?= $this->Html->link(__('Editar', true), array('action' => 'edit', $producto->id), array('class' => 'btn btn btn-warning')); ?>
                        <?= $this->Form->postLink(__('Eliminar', true), array('action' => 'delete', $producto->id),array('confirm' => __('Seguro que deseas eliminar el ticket?', $producto->id), 'class' => 'btn btn-danger')) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>        
    </table>
 </div>
        <!-- /.box-body -->     
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php $this->end(); ?>
