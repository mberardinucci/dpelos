<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Controle Entity
 *
 * @property int $id
 * @property int $ficha_id
 * @property string $detalle
 * @property \Cake\I18n\FrozenDate $fecha_control
 * @property \Cake\I18n\FrozenDate $fecha_proximo_control
 *
 * @property \App\Model\Entity\Ficha $ficha
 */
class Controle extends Entity
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
        'ficha_id' => true,
        'detalle' => true,
        'fecha_control' => true,
        'fecha_proximo_control' => true,
        'ficha' => true
    ];
}
