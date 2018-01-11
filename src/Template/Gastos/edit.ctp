<?php
/**
 * @var \App\View\AppView $this
 */
echo $this->Html->script(array(
        '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
    ));
?>
<section class="content-header">
    <h1>
        Editar gasto    
    </h1>
    
</section>
<!-- Main content -->
<section class="content">
    <?= $this->Form->create($gasto) ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del gasto</h3>
                </div>
                <div class="box-body">                                                    
                    <div class="form-group">                
                        <label>Fecha</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php
                            
                            echo $this->Form->control('fecha',array('label'=> false, 'class'=>'form-control pull-right', 'id' => 'datepicker', 'type' => 'text')); ?>                          
                        </div>                        
                    </div>                    
                    <div class="form-group">
                        <label>Descripción</label>
                            <?php echo $this->Form->control('descripcion',array('label'=> false, 'class'=>'form-control')); ?>                                                                              
                    </div>                
                    <div class="form-group">
                        <label>Monto</label>
                            <?php echo $this->Form->control('monto',array('label'=> false, 'class'=>'form-control')); ?>                                                                              
                    </div>                     
                </div>                    
            </div>            
        </div>                   
    </div>        
     <p><p><button type="submit" class="btn btn-success">Editar</button></p>
    <?= $this->Form->end() ?>                         
</section>

<?php
$this->Html->css([    
    'AdminLTE./plugins/datepicker/datepicker3',    
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Date picker
    $('#datepicker').datepicker({
        format: 'dd-mm-yyyy',        
        autoclose: true
    });
   
  });
</script>
<?php $this->end(); ?>

