<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FichefraislignefraishorsforfaitFixture
 */
class FichefraislignefraishorsforfaitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'fichefraislignefraishorsforfait';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'lignefraishf_id' => 1,
                'fichefrais_id' => 1,
            ],
        ];
        parent::init();
    }
}
