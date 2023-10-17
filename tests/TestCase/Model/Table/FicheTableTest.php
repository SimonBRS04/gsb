<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FicheTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FicheTable Test Case
 */
class FicheTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FicheTable
     */
    protected $Fiche;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Fiche',
        'app.Users',
        'app.Etat',
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
        $config = $this->getTableLocator()->exists('Fiche') ? [] : ['className' => FicheTable::class];
        $this->Fiche = $this->getTableLocator()->get('Fiche', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fiche);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FicheTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FicheTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
