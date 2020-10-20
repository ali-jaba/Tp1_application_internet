<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuelPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuelPricesTable Test Case
 */
class FuelPricesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuelPricesTable
     */
    public $FuelPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FuelPrices',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FuelPrices') ? [] : ['className' => FuelPricesTable::class];
        $this->FuelPrices = TableRegistry::getTableLocator()->get('FuelPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FuelPrices);

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
