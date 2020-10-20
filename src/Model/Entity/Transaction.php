<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $ref_fuel_types_id
 * @property \Cake\I18n\FrozenDate $Transaction_Date
 * @property int $Transaction_Amount
 * @property string $Others_Details
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\RefFuelType $ref_fuel_type
 */
class Transaction extends Entity
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
        'Transaction_Date' => true,
        'Transaction_Amount' => true,
        'Others_Details' => true,
        'created' => true,
        'modified' => true,
        'ref_fuel_type' => true,
    ];
}
