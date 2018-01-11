<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Clientes
    <small>Listado de clientes</small>
  </h1>
  
</section>

<!-- Main content -->
<section class="content">      
  <!-- Default box -->
  <div class="box">
    
    <div class="box-body">
        <?= $this->Html->link(__('Registrar cliente', true), array('action' => 'add'), array('class' => 'btn btn-primary btn-lg')); ?> <p>             
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>                
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>                
                <td><?= h($cliente->nombre) ?></td>
                <td><?= h($cliente->direccion) ?></td>
                <td><?= h($cliente->telefono) ?></td>
                <td><?= h($cliente->correo) ?></td>                   
                <td class="actions">
                    <?= $this->Html->link(__('Ver', true), array('action' => 'view', $cliente->id), array('class' => 'btn btn-info')); ?>
                    <?= $this->Html->link(__('Editar', true), array('action' => 'edit', $cliente->id), array('class' => 'btn btn btn-warning')); ?>
                    <?= $this->Form->postLink(__('Eliminar', true), array('action' => 'delete', $cliente->id),array('confirm' => __('Seguro que deseas eliminar el ticket?', $cliente->id), 'class' => 'btn btn-danger')) ?>   
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