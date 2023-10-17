<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LigneforfaitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LigneforfaitTable Test Case
 */
class LigneforfaitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LigneforfaitTable
     */
    protected $Ligneforfait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Ligneforfait',
        'app.Forfait',
        'app.Fichefraisligne',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ligneforfait') ? [] : ['className' => LigneforfaitTable::class];
        $this->Ligneforfait = $this->getTableLocator()->get('Ligneforfait', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ligneforfait);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LigneforfaitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LigneforfaitTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
