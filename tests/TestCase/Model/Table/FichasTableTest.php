<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FichasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FichasTable Test Case
 */
class FichasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FichasTable
     */
    public $Fichas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Fichas') ? [] : ['className' => FichasTable::class];
        $this->Fichas = TableRegistry::get('Fichas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fichas);

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
