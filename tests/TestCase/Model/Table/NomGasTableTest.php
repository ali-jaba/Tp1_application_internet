<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NomGasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NomGasTable Test Case
 */
class NomGasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NomGasTable
     */
    public $NomGas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NomGas',
        'app.RefFuelTypes',
        'app.LieuGas',
        'app.PrixGas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NomGas') ? [] : ['className' => NomGasTable::class];
        $this->NomGas = TableRegistry::getTableLocator()->get('NomGas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NomGas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
