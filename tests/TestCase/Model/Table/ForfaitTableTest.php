<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForfaitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForfaitTable Test Case
 */
class ForfaitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ForfaitTable
     */
    protected $Forfait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Forfait',
        'app.Ligneforfait',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Forfait') ? [] : ['className' => ForfaitTable::class];
        $this->Forfait = $this->getTableLocator()->get('Forfait', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Forfait);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ForfaitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
