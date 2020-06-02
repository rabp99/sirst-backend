<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estado Entity
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property \App\Model\Entity\Antena[] $antenas
 * @property \App\Model\Entity\Central[] $centrales
 * @property \App\Model\Entity\Cruce[] $cruces
 * @property \App\Model\Entity\Enlace[] $enlaces
 * @property \App\Model\Entity\Marca[] $marcas
 * @property \App\Model\Entity\Modelo[] $modelos
 * @property \App\Model\Entity\Punto[] $puntos
 * @property \App\Model\Entity\regulador[] $reguladores
 * @property \App\Model\Entity\TSwitch[] $t_switches
 */
class Estado extends Entity
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
        'descripcion' => true,
        'antenas' => true,
        'centrales' => true,
        'cruces' => true,
        'enlaces' => true,
        'marcas' => true,
        'modelos' => true,
        'puntos' => true,
        'reguladores' => true,
        't_switches' => true
    ];
}
