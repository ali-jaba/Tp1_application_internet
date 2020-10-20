<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuelPrice Entity
 *
 * @property int $id
 * @property int $ref_fuel_types_id
 * @property \Cake\I18n\FrozenDate $Fuel_Price_Date
 * @property int $Unit_Buying_Price
 * @property int $Unit_Sales_Price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class FuelPrice extends Entity
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
        'ref_fuel_types_id' => true,
        'Fuel_Price_Date' => true,
        'Unit_Buying_Price' => true,
        'Unit_Sales_Price' => true,
        'created' => true,
        'modified' => true,
    ];
}
