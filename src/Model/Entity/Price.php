<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Price Entity
 *
 * @property int $price_id
 * @property int $shoes_id
 * @property int $store_id
 * @property string $price
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Shoe $shoe
 * @property \App\Model\Entity\Store $store
 */
class Price extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'shoes_id' => true,
        'store_id' => true,
        'price' => true,
        'created_at' => true,
        'updated_at' => true,
        'shoe' => true,
        'store' => true,
    ];
}
