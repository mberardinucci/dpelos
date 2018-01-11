<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 *
 * @property \App\Model\Entity\Ficha[] $fichas
 * @property \App\Model\Entity\Ingreso[] $ingresos
 */
class Cliente extends Entity
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
        'direccion' => true,
        'telefono' => true,
        'correo' => true,
        'fichas' => true,
        'ingresos' => true
    ];
}
