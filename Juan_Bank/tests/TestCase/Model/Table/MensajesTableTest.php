<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MensajesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MensajesTable Test Case
 */
class MensajesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MensajesTable
     */
    protected $Mensajes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Mensajes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Mensajes') ? [] : ['className' => MensajesTable::class];
        $this->Mensajes = $this->getTableLocator()->get('Mensajes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Mensajes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MensajesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
