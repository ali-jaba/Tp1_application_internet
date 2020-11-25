<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrixGa Entity
 *
 * @property int $id
 * @property int $lieu_id
 * @property int $prix
 *
 * @property \App\Model\Entity\LieuGa $lieu_ga
 * @property \App\Model\Entity\NomGa[] $nom_gas
 */
class PrixGa extends Entity
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
        'prix' => true,
        'lieu_ga' => true,
        'nom_gas' => true,
    ];
}
