<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GastosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GastosTable Test Case
 */
class GastosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GastosTable
     */
    public $Gastos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gastos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gastos') ? [] : ['className' => GastosTable::class];
        $this->Gastos = TableRegistry::get('Gastos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gastos);

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
