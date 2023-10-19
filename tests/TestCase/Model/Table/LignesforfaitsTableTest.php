<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignesforfaitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignesforfaitsTable Test Case
 */
class LignesforfaitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignesforfaitsTable
     */
    protected $Lignesforfaits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignesforfaits',
        'app.Forfaits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lignesforfaits') ? [] : ['className' => LignesforfaitsTable::class];
        $this->Lignesforfaits = $this->getTableLocator()->get('Lignesforfaits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignesforfaits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignesforfaitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LignesforfaitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
