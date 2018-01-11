<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VentaProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VentaProductosTable Test Case
 */
class VentaProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VentaProductosTable
     */
    public $VentaProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.venta_productos',
        'app.ingresos',
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
        $config = TableRegistry::exists('VentaProductos') ? [] : ['className' => VentaProductosTable::class];
        $this->VentaProductos = TableRegistry::get('VentaProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VentaProductos);

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
