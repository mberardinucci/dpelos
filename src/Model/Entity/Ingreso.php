<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ingreso Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fecha
 * @property string $medio_pago
 * @property int $monto
 * @property int $cliente_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Servicio[] $servicios
 * @property \App\Model\Entity\VentaProducto[] $venta_productos
 */
class Ingreso extends Entity
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
        'fecha' => true,
        'medio_pago' => true,
        'monto' => true,
        'cliente_id' => true,
        'cliente' => true,
        'servicios' => true,
        'venta_productos' => true
    ];
}
