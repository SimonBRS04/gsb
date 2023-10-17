<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LignefraishorsforfaitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LignefraishorsforfaitTable Test Case
 */
class LignefraishorsforfaitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LignefraishorsforfaitTable
     */
    protected $Lignefraishorsforfait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Lignefraishorsforfait',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lignefraishorsforfait') ? [] : ['className' => LignefraishorsforfaitTable::class];
        $this->Lignefraishorsforfait = $this->getTableLocator()->get('Lignefraishorsforfait', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lignefraishorsforfait);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LignefraishorsforfaitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
