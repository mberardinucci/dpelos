<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gasto Entity
 *
 * @property int $id
 * @property int $monto
 * @property string $descripcion
 * @property \Cake\I18n\FrozenDate $fecha
 */
class Gasto extends Entity
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
        'monto' => true,
        'descripcion' => true,
        'fecha' => true
    ];
}
