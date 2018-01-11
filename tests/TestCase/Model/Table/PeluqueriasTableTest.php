<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeluqueriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeluqueriasTable Test Case
 */
class PeluqueriasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeluqueriasTable
     */
    public $Peluquerias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.peluquerias',
        'app.fichas',
        'app.clientes',
        'app.ingresos',
        'app.servicios',
        'app.tipo_servicios',
        'app.venta_productos',
        'app.productos',
        'app.tipo_productos',
        'app.pacientes',
        'app.controles',
        'app.desparasitaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Peluquerias') ? [] : ['className' => PeluqueriasTable::class];
        $this->Peluquerias = TableRegistry::get('Peluquerias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Peluquerias);

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
