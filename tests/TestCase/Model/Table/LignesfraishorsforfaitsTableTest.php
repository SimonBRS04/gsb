<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignesfraishorsforfaitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignesfraishorsforfaitsTable Test Case
 */
class LignesfraishorsforfaitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignesfraishorsforfaitsTable
     */
    protected $Lignesfraishorsforfaits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignesfraishorsforfaits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lignesfraishorsforfaits') ? [] : ['className' => LignesfraishorsforfaitsTable::class];
        $this->Lignesfraishorsforfaits = $this->getTableLocator()->get('Lignesfraishorsforfaits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignesfraishorsforfaits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignesfraishorsforfaitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
