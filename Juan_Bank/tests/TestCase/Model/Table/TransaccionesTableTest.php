<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransaccionesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransaccionesTable Test Case
 */
class TransaccionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransaccionesTable
     */
    protected $Transacciones;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Transacciones',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Transacciones') ? [] : ['className' => TransaccionesTable::class];
        $this->Transacciones = $this->getTableLocator()->get('Transacciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Transacciones);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TransaccionesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
