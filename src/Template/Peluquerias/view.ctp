<section class="content-header">
  <h1>
    <?php echo __('Peluqueria'); ?>
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
                                                                                                        <dt><?= __('Ficha') ?></dt>
                                <dd>
                                    <?= $peluqueria->has('ficha') ? $peluqueria->ficha->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Fecha') ?></dt>
                                <dd>
                                    <?= h($peluqueria->fecha) ?>
                                </dd>
                                                                                                                    <dt><?= __('Fecha Proxima Peluqueria') ?></dt>
                                <dd>
                                    <?= h($peluqueria->fecha_proxima_peluqueria) ?>
                                </dd>
                                                                                                    
                                            
                                                                        <dt><?= __('Descripcion') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($peluqueria->descripcion)); ?>
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
