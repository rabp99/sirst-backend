<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Punto Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string|null $descripcion
 * @property string $latitud
 * @property string $longitud
 *
 * @property \App\Model\Entity\Antena[] $antenas
 * @property \App\Model\Entity\Cruce[] $cruces
 * @property \App\Model\Entity\Reguladore[] $reguladores
 * @property \App\Model\Entity\TSwitch[] $t_switches
 */
class Punto extends Entity
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
        'codigo' => true,
        'descripcion' => true,
        'latitud' => true,
        'longitud' => true,
        'antenas' => true,
        'cruces' => true,
        'reguladores' => true,
        't_switches' => true
    ];
}
