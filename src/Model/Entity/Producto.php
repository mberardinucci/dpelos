<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id
 * @property string $nombre
 * @property int $valor_compra
 * @property int $valor_venta
 * @property int $stock
 * @property int $alerta_stock
 * @property int $tipo_producto_id
 *
 * @property \App\Model\Entity\TipoProducto $tipo_producto
 * @property \App\Model\Entity\VentaProducto[] $venta_productos
 */
class Producto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'valor_compra' => true,
        'valor_venta' => true,
        'stock' => true,
        'alerta_stock' => true,
        'tipo_producto_id' => true,
        'tipo_producto' => true,
        'venta_productos' => true
    ];
}
