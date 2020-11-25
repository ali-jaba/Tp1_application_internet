<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NomGasFixture
 */
class NomGasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'lieu_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prix_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nom' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'nom_gas_lieu' => ['type' => 'index', 'columns' => ['lieu_id'], 'length' => []],
            'nom_gas_prix' => ['type' => 'index', 'columns' => ['prix_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'nom_gas_lieu' => ['type' => 'foreign', 'columns' => ['lieu_id'], 'references' => ['lieu_gas', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'nom_gas_prix' => ['type' => 'foreign', 'columns' => ['prix_id'], 'references' => ['prix_gas', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'lieu_id' => 1,
                'prix_id' => 1,
                'nom' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
