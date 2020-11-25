<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LieuGasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LieuGasTable Test Case
 */
class LieuGasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LieuGasTable
     */
    public $LieuGas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LieuGas',
        'app.NomGas',
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
        $config = TableRegistry::getTableLocator()->exists('LieuGas') ? [] : ['className' => LieuGasTable::class];
        $this->LieuGas = TableRegistry::getTableLocator()->get('LieuGas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LieuGas);

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
}
