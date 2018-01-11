<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>        
        <?php //echo $this->Form->select("VentaProducto.{$key}.nombre",$productos, array('label'=>false, 'class'=>'form-control select2'));
        
        echo $this->Form->input(
            "VentaProducto.{$key}.nombre", 
            [
                'type' => 'select',
                'multiple' => false,
                'options' => $productos, 
                'label' => false,
                'empty'=>'Selecciona 1 producto',
            ]
        );
        ?> 
    </td>    
    <td>
        <?php echo $this->Form->text("VentaProducto.{$key}.cantidad", array('default'=>1)); ?>        
    </td>   
    
    <td class="actions">
        <a href="#" class="remove">Eliminar servicio</a>
    </td>
</tr>

