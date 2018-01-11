<section class="content-header">
  <h1>
    <?php echo __('Mascota'); ?>
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
                                                                                                                <dt><?= __('Nombre') ?></dt>
                                        <dd>
                                            <?= h($mascota->nombre) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Especie') ?></dt>
                                        <dd>
                                            <?= h($mascota->especie) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Raza') ?></dt>
                                        <dd>
                                            <?= h($mascota->raza) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Foto') ?></dt>
                                        <dd>
                                            <?= h($mascota->foto) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Color') ?></dt>
                                <dd>
                                    <?= $this->Number->format($mascota->color) ?>
                                </dd>
                                                                                                                <dt><?= __('Edad') ?></dt>
                                <dd>
                                    <?= $this->Number->format($mascota->edad) ?>
                                </dd>
                                                                                                                <dt><?= __('Peso') ?></dt>
                                <dd>
                                    <?= $this->Number->format($mascota->peso) ?>
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Fichas']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($mascota->fichas)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cliente Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Mascota Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($mascota->fichas as $fichas): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($fichas->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fichas->cliente_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fichas->mascota_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Fichas', 'action' => 'view', $fichas->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fichas', 'action' => 'edit', $fichas->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fichas', 'action' => 'delete', $fichas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichas->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
