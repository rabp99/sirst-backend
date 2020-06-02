<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cruce Entity
 *
 * @property int $id
 * @property int $punto_id
 * @property int $regulador_id
 * @property string $codigo
 * @property string $descripcion
 *
 * @property \App\Model\Entity\Punto $punto
 * @property \App\Model\Entity\Regulador $regulador
 */
class Cruce extends Entity
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
        'punto_id' => true,
        'regulador_id' => true,
        'codigo' => true,
        'descripcion' => true,
        'punto' => true,
        'regulador' => true,
        'estado_id' => true
    ];
}
