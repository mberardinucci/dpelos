<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MascotasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MascotasTable Test Case
 */
class MascotasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MascotasTable
     */
    public $Mascotas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mascotas',
        'app.fichas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mascotas') ? [] : ['className' => MascotasTable::class];
        $this->Mascotas = TableRegistry::get('Mascotas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mascotas);

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
