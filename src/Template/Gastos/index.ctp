<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingreso[]|\Cake\Collection\CollectionInterface $ingresos
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Gastos
    <small>Listado de gastos</small>
  </h1>
  
</section>

<!-- Main content -->
<section class="content">      
  <!-- Default box -->
  <div class="box">
    
    <div class="box-body">
        <?= $this->Html->link(__('Registrar gasto', true), array('action' => 'add'), array('class' => 'btn btn-primary btn-lg')); ?> <p>             
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('monto') ?></th>                    
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($gastos as $gasto): ?>
                <tr>
                    <td><?= $gasto->descripcion ?></td>
                    <td><?= h($gasto->fecha->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td><?= $this->Number->format($gasto->monto) ?></td>                    
                    <td class="actions">
                        <?= $this->Html->link(__('Ver', true), array('action' => 'view', $gasto->id), array('class' => 'btn btn-info')); ?>
                        <?= $this->Html->link(__('Editar', true), array('action' => 'edit', $gasto->id), array('class' => 'btn btn btn-warning')); ?>
                        <?= $this->Form->postLink(__('Eliminar', true), array('action' => 'delete', $gasto->id),array('confirm' => __('Seguro que deseas eliminar el ticket?', $gasto->id), 'class' => 'btn btn-danger')) ?>   
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

