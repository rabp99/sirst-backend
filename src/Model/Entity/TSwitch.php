<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TSwitch Entity
 *
 * @property int $id
 * @property int $modelo_id
 * @property int $punto_id
 * @property string|null $ip
 *
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Punto $punto
 */
class TSwitch extends Entity
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
        'ip' => true,
        'modelo' => true,
        'punto' => true
    ];
}
