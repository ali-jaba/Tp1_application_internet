<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrixGasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrixGasTable Test Case
 */
class PrixGasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrixGasTable
     */
    public $PrixGas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PrixGas',
        'app.LieuGas',
        'app.NomGas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrixGas') ? [] : ['className' => PrixGasTable::class];
        $this->PrixGas = TableRegistry::getTableLocator()->get('PrixGas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrixGas);

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
