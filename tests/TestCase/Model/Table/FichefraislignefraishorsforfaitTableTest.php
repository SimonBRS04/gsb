<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FichefraislignefraishorsforfaitTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FichefraislignefraishorsforfaitTable Test Case
 */
class FichefraislignefraishorsforfaitTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FichefraislignefraishorsforfaitTable
     */
    protected $Fichefraislignefraishorsforfait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fichefraislignefraishorsforfait',
        'app.Lignefraishorsforfait',
        'app.Fiche',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fichefraislignefraishorsforfait') ? [] : ['className' => FichefraislignefraishorsforfaitTable::class];
        $this->Fichefraislignefraishorsforfait = $this->getTableLocator()->get('Fichefraislignefraishorsforfait', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fichefraislignefraishorsforfait);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FichefraislignefraishorsforfaitTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FichefraislignefraishorsforfaitTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
