<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Clientes    
  </h1>

</section>

 <!-- Main content -->
<section class="content">
    <div class="box">                
        <!-- /.box-header -->
        <div class="box-body">
            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Nombre') ?></th>
                    <td><?= h($cliente->nombre) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Direccion') ?></th>
                    <td><?= h($cliente->direccion) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Telefono') ?></th>
                    <td><?= h($cliente->telefono) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Correo') ?></th>
                    <td><?= h($cliente->correo) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
            </table>             
        </div>
<!-- /.box-body -->        
    </div>
<!-- /.box -->
        
    <div class="row">
        <div class="col-md-6">
            <div class="box">                
            <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fichas relacionadas</h3>
                    </div>            
                    <?php if (!empty($cliente->fichas)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>                                                                
                                <th scope="col"><?= __('Mascota Id') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($cliente->fichas as $fichas): ?>
                            <tr>
                                <td><?= h($fichas->mascota_id) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver', true), array('action' => 'view', $fichas->id), array('class' => 'btn btn-info')); ?> 
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">            
            <div class="box">
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ingresos relacionados</h3>
                    </div>                  
                    <?php if (!empty($cliente->ingresos)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>                                    
                                <th scope="col"><?= __('Fecha') ?></th>
                                <th scope="col"><?= __('Medio Pago') ?></th>
                                <th scope="col"><?= __('Monto') ?></th>                                    
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($cliente->ingresos as $ingresos): ?>
                            <tr>                                    
                                <td><?= h($ingresos->fecha->i18nFormat('dd-MM-yyyy')) ?></td>
                                <td><?= h($ingresos->medio_pago) ?></td>
                                <td><?= h($ingresos->monto) ?></td>                                    
                                <td class="actions">
                                    
                                    <?= $this->Html->link(__('Ver', true), array('controller' => 'Ingresos','action' => 'view', $ingresos->id), array('class' => 'btn btn-info')); ?>                                    
                                </td>
                            </tr>
                             <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>                
            </div>
        </div>
    </div>
</section>
