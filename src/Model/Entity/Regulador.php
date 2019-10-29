<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Regulador Entity
 *
 * @property int $id
 * @property int $modelo_id
 * @property int $central_id
 * @property int $punto_id
 * @property int $puerto_id
 * @property string $codigo
 * @property string $ip
 *
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Central $central
 * @property \App\Model\Entity\Punto $punto
 * @property \App\Model\Entity\Puerto $puerto
 */
class Regulador extends Entity
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
        'central_id' => true,
        'punto_id' => true,
        'puerto_id' => true,
        'codigo' => true,
        'ip' => true,
        'modelo' => true,
        'central' => true,
        'punto' => true,
        'puerto' => true
    ];
}
