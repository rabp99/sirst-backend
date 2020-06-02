<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Antena Entity
 *
 * @property int $id
 * @property int $punto_id
 * @property int $enlace_id
 * @property int $modelo_id
 * @property int $puerto_id
 * @property string $ip
 * @property string $device_name
 * @property string $mode
 *
 * @property \App\Model\Entity\Punto $punto
 * @property \App\Model\Entity\Enlace $enlace
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Puerto $puerto
 */
class Antena extends Entity
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
        'puerto_id' => true,
        'ip' => true,
        'device_name' => true,
        'mode' => true,
        'punto' => true,
        'enlace' => true,
        'modelo' => true,
        'puerto' => true,
        'punto_id' => true,
        'enlace_id' => true,
        'modelo_id' => true,
        'estado_id' => true
    ];
}
