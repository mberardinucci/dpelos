<section class="content-header">
  <h1>
    Ficha
    <small><?= __('Add') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Cliente') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($ficha, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="radio">
              <label>
                <!--
                <div>
                  <input type="radio" value="1" name="habilitarDeshabilitar" onchange="habilitar(this.value);" checked> Habilitar

                  <input type="radio" value="2" name="habilitarDeshabilitar" onchange="habilitar(this.value);"> Deshabilitar
                </div>-->

                <input type="radio" value="cliente1" name="habilitarDeshabilitar" onchange="habilitar(this.value);" checked>Cliente registrado
              </label>
                <?php
                  echo $this->Form->input('cliente_id', ['options' => $clientes], array('name' => 'hola'));            
                ?>
            </div>
            <div class="radio">
              <label>
              <input type="radio" value="cliente2" name="habilitarDeshabilitar" onchange="habilitar(this.value);"> Cliente no registrado                
              </label>
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
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Paciente') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($ficha, array('role' => 'form')) ?>
          <div class="box-body">
          <div id="accordion">
            <h3>Paciente registrado</h3>
            <div>
              <?php            
                  echo $this->Form->input('paciente_id', ['options' => $pacientes]);
              ?>
            </div>
            <h3>Paciente no registrado</h3>
            <div>
                <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('especie');
            echo $this->Form->input('raza');
            echo $this->Form->input('color');
            echo $this->Form->input('edad');
            echo $this->Form->input('peso');
            echo $this->Form->input('foto');
          ?>
            </div>  
          </div>
          
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Controles') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($ficha, array('role' => 'form')) ?>
          <div class="box-body">
          <?php            
            echo 'Control'
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Desparacitaciones') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($ficha, array('role' => 'form')) ?>
          <div class="box-body">
          <?php            
            echo 'Desparacitaciones'
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Peluquerias') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($ficha, array('role' => 'form')) ?>
          <div class="box-body">
          <?php            
            echo 'Peluquerias'
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>


  </div>
</section>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({
      icons: icons
    });
    $( "#toggle" ).button().on( "click", function() {
      if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
        $( "#accordion" ).accordion( "option", "icons", null );
      } else {
        $( "#accordion" ).accordion( "option", "icons", icons );
      }
    });
  } );
  </script>

    <script>

    function habilitar(value)

    {

      if(value=="cliente1")

      {

        // habilitamos
        alert('hola mundo');
        document.getElementById("hola").disabled=false;

      }else if(value=="cliente2"){

        // deshabilitamos

        document.getElementById("hola").disabled=true;

      }

    }

  </script>