<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VentaProducto Entity
 *
 * @property int $id
 * @property string $nombre
 * @property int $valor
 * @property int $cantidad
 * @property int $ingreso_id
 * @property int $producto_id
 *
 * @property \App\Model\Entity\Ingreso $ingreso
 * @property \App\Model\Entity\Producto $producto
 */
class VentaProducto extends Entity
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
        'valor' => true,
        'cantidad' => true,
        'ingreso_id' => true,
        'producto_id' => true,
        'ingreso' => true,
        'producto' => true
    ];
}
