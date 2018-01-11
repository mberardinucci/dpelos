<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar producto 
  </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">        
        <div class="col-md-6">    
            <div class="box box-info">            
                <div class="box-body">                
                    <?= $this->Form->create($producto) ?>                    
                        <div class="form-group">
                            
                            <?php echo $this->Form->control('nombre',array('label'=>'Nombre', 'class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">                        
                            <?php echo $this->Form->control('valor_compra',array('label'=>'Valor de compra', 'class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->control('valor_venta',array('label'=>'Valor de venta', 'class'=>'form-control')); ?>                        
                        </div>
                        <div class="form-group">
                             <?php echo $this->Form->control('stock',array('label'=>'Stock', 'class'=>'form-control')); ?>                                                
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->control('alerta_stock',array('label'=>'Alerta stock', 'class'=>'form-control')); ?>                                  
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->control('tipo_producto_id',array('label'=>'Tipo de producto', 'class'=>'form-control'),['options' => $tipoProductos]); ?>                                                          
                       </div>
                        </div>
                    
                    <button type="submit" class="btn btn-success">Editar</button>
        <?= $this->Form->end() ?>
                </div>                    
            </div>
        </div>
    </div>
</section>