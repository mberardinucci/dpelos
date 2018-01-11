<section class="content-header">
  <h1>
    <?php echo __('Desparasitacione'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                                                                                                                <dt><?= __('Dosis') ?></dt>
                                        <dd>
                                            <?= h($desparasitacione->dosis) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Ficha') ?></dt>
                                <dd>
                                    <?= $desparasitacione->has('ficha') ? $desparasitacione->ficha->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Fecha') ?></dt>
                                <dd>
                                    <?= h($desparasitacione->fecha) ?>
                                </dd>
                                                                                                                    <dt><?= __('Fecha Proxima Desparasitacion') ?></dt>
                                <dd>
                                    <?= h($desparasitacione->fecha_proxima_desparasitacion) ?>
                                </dd>
                                                                                                    
                                            
                                    </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>
