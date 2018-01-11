<?php
/**
 * @var \App\View\AppView $this
 */
echo $this->Html->script(array(
	    '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
	    '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
	));
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nuevo ingreso    
    </h1>
    <ol class="breadcrumb">
        <div class="form-group">
        <!--<label>Valor</label>-->
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-fw fa-usd"></i>
                </div>
                <input type="text" class="form-control" label=false placeholder="0" disabled>
            </div>
        </div>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <?= $this->Form->create($ingreso) ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos de Ingreso</h3>
                </div>
                <div class="box-body">                                                    
                    <div class="form-group">                
                        <label>Fecha</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php
                            date_default_timezone_set('America/Santiago');
                            $date = date('d-m-Y');
                            echo $this->Form->control('fecha',array('default'=> $date,'label'=> false, 'class'=>'form-control pull-right', 'id' => 'datepicker', 'type' => 'text')); ?>                          
                        </div>                        
                    </div>                    
                    <div class="form-group">
                        <label>Medio de pago</label>
                            <?php echo $this->Form->control('medio_pago',array('label'=> false, 'class'=>'form-control', 'options' => array('Efectivo' => 'Efectivo','Transferencia' => 'Transferencia'))); ?>                                                                              
                    </div>
                    
                            <?php echo $this->Form->hidden('monto',array('default'=>0,'label'=> false, 'class'=>'form-control')); ?>                                                                              
                    
                    <div class="form-group">
                        <label>Cliente</label>
                        <?php echo $this->Form->control('cliente_id', array('label'=> false, 'class'=>'form-control select2'), ['options' => $clientes]); ?>

                    </div>                    
                </div>                    
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Servicios</h3>
                </div>
                <div class="box-body">
                         
                    <div class="form-group">
                      <label>Descripcion servicio</label>
                      <?php echo $this->Form->textarea('nombreServicio',array('label'=>false, 'rows'=>2,'class'=>'form-control')); ?>                  
                    </div>
                    <div class="form-group">
                        <label>Tipo de servicio</label>
                        <?php echo $this->Form->control('tipo', array('label'=> false, 'class'=>'form-control'), ['options' => $tipos]); ?>
                    </div>  
                    <div class="form-group">
                      <label>Valor</label>
                      <?php echo $this->Form->control('valorServicio',array('label'=>false, 'class'=>'form-control')); ?>    
                    </div>                
                </div>                    
            </div>
        </div>  
     </div>
            
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Productos</h3>
            </div>
            <div class="box-body">
                         
            <fieldset>
                <table class="table table-striped" id="producto-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>                                                    
                            <th>Cantidad</th>   
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td></td>                                
                                <td></td>     
                                <td class="actions">
                                    <a href="#" class="add">Agregar producto</a>
                                    
                                </td>
                            </tr>
                        </tfoot>
                </table>
            </fieldset>       
            <script id="producto-template" type="text/x-underscore-template">
                <?php echo $this->element('productos', ['productos' => $productos]);?>
            </script>                                                    
            </div>                    
        </div>                            
        <p><p><button type="submit" class="btn btn-success">Ingresar</button></p>
    <?= $this->Form->end() ?>              
</section>



<script>
$(document).ready(function() {
    var
        productoTable = $('#producto-table'),
        productoBody = productoTable.find('tbody'),
        productoTemplate = _.template($('#producto-template').remove().text()),
        numberRows = productoTable.find('tbody > tr').length;

    productoTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();

            $(productoTemplate({key: numberRows++}))
                .hide()
                .appendTo(productoBody)
                .fadeIn('fast');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();

            $(this)
                .closest('tr')
                .fadeOut('fast', function() {
                    $(this).remove();
                });
        });

        if (numberRows === 0) {
            productoTable.find('a.add').click();
        }
});
</script>

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
