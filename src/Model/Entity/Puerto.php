<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Puerto Entity
 *
 * @property int $id
 * @property string $nro_puerto
 * @property int $t_switch_id
 *
 * @property \App\Model\Entity\TSwitch $t_switch
 */
class Puerto extends Entity
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
        'nro_puerto' => true,
        't_switch' => true
    ];
}
