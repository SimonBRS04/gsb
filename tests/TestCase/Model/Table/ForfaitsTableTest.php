<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForfaitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForfaitsTable Test Case
 */
class ForfaitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ForfaitsTable
     */
    protected $Forfaits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Forfaits',
        'app.Lignesforfaits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Forfaits') ? [] : ['className' => ForfaitsTable::class];
        $this->Forfaits = $this->getTableLocator()->get('Forfaits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Forfaits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ForfaitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
