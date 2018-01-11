<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngresosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngresosTable Test Case
 */
class IngresosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IngresosTable
     */
    public $Ingresos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingresos',
        'app.clientes',
        'app.fichas',
        'app.servicios',
        'app.tipo_servicios',
        'app.venta_productos',
        'app.productos',
        'app.tipo_productos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ingresos') ? [] : ['className' => IngresosTable::class];
        $this->Ingresos = TableRegistry::get('Ingresos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ingresos);

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
