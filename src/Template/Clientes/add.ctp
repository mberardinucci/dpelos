<?php
/**
 * @var \App\View\AppView $this
 */
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nuevo cliente
    </h1>
    
</section>
<!-- Main content -->
<section class="content">
    <?= $this->Form->create($cliente) ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del cliente</h3>
                </div>
                <div class="box-body">                                                    
                                      
                    <div class="form-group">
                        <label>Nombre</label>
                            <?php echo $this->Form->control('nombre',array('label'=> false, 'class'=>'form-control')); ?>                                                                              
                    </div> 
                    <div class="form-group">
                        <label>Dirección</label>
                            <?php echo $this->Form->control('direccion',array('label'=> false, 'class'=>'form-control')); ?>                                                                              
                    </div>       
                    <div class="form-group">
                        <label>Teléfono</label>
                            <?php echo $this->Form->control('telefono',array('label'=> false, 'class'=>'form-control')); ?>                                                                              
                    </div>                            
                    <div class="form-group">
                        <label>Correo</label>
                            <?php echo $this->Form->control('correo',array('label'=> false, 'class'=>'form-control')); ?>                                                                              
                    </div>                                                                                                                                                                                                                    
                </div>                    
            </div>
        </div>        
     </div>                                         
    <p><p><button type="submit" class="btn btn-success">Ingresar</button></p>
    <?= $this->Form->end() ?>              
</section>
