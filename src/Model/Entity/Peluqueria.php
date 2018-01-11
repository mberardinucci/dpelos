<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Peluqueria Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\FrozenDate $fecha_proxima_peluqueria
 * @property string $descripcion
 * @property int $ficha_id
 *
 * @property \App\Model\Entity\Ficha $ficha
 */
class Peluqueria extends Entity
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
        'fecha_proxima_peluqueria' => true,
        'descripcion' => true,
        'ficha_id' => true,
        'ficha' => true
    ];
}
