<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingreso[]|\Cake\Collection\CollectionInterface $ingresos
 */
?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ingresos
        <small>Listado de ingresos</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">      
      <!-- Default box -->
      <div class="box">
        
        <div class="box-body">
            <?= $this->Html->link(__('Registrar ingreso', true), array('action' => 'add'), array('class' => 'btn btn-primary btn-lg')); ?> <p>             
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                    
                    <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('monto') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('medio_pago') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                </tr>
                </thead>
                <tbody>                
                <?php foreach ($ingresos as $ingreso): ?>
            <tr>                
                <td><?= h($ingreso->fecha->i18nFormat('dd-MM-yyyy')) ?></td>
                <td><?= $this->Number->format($ingreso->monto) ?></td>
                <td><?= h($ingreso->medio_pago) ?></td>
                <td><?= $ingreso->has('cliente') ? $this->Html->link($ingreso->cliente->nombre, ['controller' => 'Clientes', 'action' => 'view', $ingreso->cliente->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver', true), array('action' => 'view', $ingreso->id), array('class' => 'btn btn-info')); ?>
                    <?= $this->Html->link(__('Editar', true), array('action' => 'edit', $ingreso->id), array('class' => 'btn btn btn-warning')); ?>
                    <?= $this->Form->postLink(__('Eliminar', true), array('action' => 'delete', $ingreso->id),array('confirm' => __('Seguro que deseas eliminar el ticket?', $ingreso->id), 'class' => 'btn btn-danger')) ?>                   
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