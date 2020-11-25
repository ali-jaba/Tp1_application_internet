<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NomGa Entity
 *
 * @property int $id
 * @property int $lieu_id
 * @property int $prix_id
 * @property string $nom
 *
 * @property \App\Model\Entity\RefFuelType[] $ref_fuel_types
 * @property \App\Model\Entity\LieuGa $lieu_ga
 * @property \App\Model\Entity\PrixGa $prix_ga
 */
class NomGa extends Entity
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
        'lieu_id' => true,
        'prix_id' => true,
        'nom' => true,
        'ref_fuel_types' => true,
        'lieu_ga' => true,
        'prix_ga' => true,
    ];
}
