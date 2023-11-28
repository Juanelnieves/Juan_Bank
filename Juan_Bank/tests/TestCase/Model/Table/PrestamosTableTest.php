<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrestamosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrestamosTable Test Case
 */
class PrestamosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrestamosTable
     */
    protected $Prestamos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Prestamos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Prestamos') ? [] : ['className' => PrestamosTable::class];
        $this->Prestamos = $this->getTableLocator()->get('Prestamos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Prestamos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrestamosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
