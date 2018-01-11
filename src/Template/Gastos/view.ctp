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
                            <th scope="row"><?= __('Descripcion') ?></th>
                            <td><?= $gasto->descripcion ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Fecha') ?></th>
                            <td><?= h($gasto->fecha) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Monto') ?></th>
                            <td><?= $this->Number->format($gasto->monto) ?></td>
                        </tr>
                        
                    </table>                    
                </div>
        <!-- /.box-body -->        
      </div>
      <!-- /.box -->
    </div>
</div>