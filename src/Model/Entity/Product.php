<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $user_id
 * @property float|null $price
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 * @property int|null $type_id
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Orderline[] $orderlines
 * @property \App\Model\Entity\ProductsNameTranslation $name_translation
 * @property \App\Model\Entity\I18n[] $_i18n
 */
class Product extends Entity
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
        'name' => true,
        'user_id' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'type_id' => true,
        'users' => true,
        'type' => true,
        'orderlines' => true,
        'name_translation' => true,
        '_i18n' => true
    ];
}
