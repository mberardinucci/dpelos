<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paciente Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $especie
 * @property string $raza
 * @property string $color
 * @property int $edad
 * @property int $peso
 * @property string $foto
 *
 * @property \App\Model\Entity\Ficha[] $fichas
 */
class Paciente extends Entity
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
        'especie' => true,
        'raza' => true,
        'color' => true,
        'edad' => true,
        'peso' => true,
        'foto' => true,
        'fichas' => true
    ];
}
