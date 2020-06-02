<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enlace Entity
 *
 * @property int $id
 * @property string $ssid
 * @property string $channel_width
 *
 * @property \App\Model\Entity\Antena[] $antenas
 */
class Enlace extends Entity
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
        'ssid' => true,
        'channel_width' => true,
        'antenas' => true,
        'estado_id' => true
    ];
}
