<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefFuelType Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $Fuel_Type_Name
 * @property string $slug
 * @property string $Fuel_Type_Description
 * @property int $Unit_Buying_Price
 * @property int $Unit_Sales_Price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class RefFuelType extends Entity
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
        'id' => true,
        'user_id' => true,
        'NomGas_id' => true,
        'Fuel_Type_Name' => true,
        'slug' => true,
        'Fuel_Type_Description' => true,
        'Unit_Buying_Price' => true,
        'Unit_Sales_Price' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
