<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesparasitacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesparasitacionesTable Test Case
 */
class DesparasitacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesparasitacionesTable
     */
    public $Desparasitaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.desparasitaciones',
        'app.fichas',
        'app.clientes',
        'app.ingresos',
        'app.servicios',
        'app.tipo_servicios',
        'app.venta_productos',
        'app.productos',
        'app.tipo_productos',
        'app.pacientes',
        'app.controles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Desparasitaciones') ? [] : ['className' => DesparasitacionesTable::class];
        $this->Desparasitaciones = TableRegistry::get('Desparasitaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Desparasitaciones);

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
