<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ficha Entity
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $paciente_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Paciente $paciente
 * @property \App\Model\Entity\Controle[] $controles
 * @property \App\Model\Entity\Desparasitacione[] $desparasitaciones
 */
class Ficha extends Entity
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
        'cliente_id' => true,
        'paciente_id' => true,
        'cliente' => true,
        'paciente' => true,
        'controles' => true,
        'desparasitaciones' => true
    ];
}
