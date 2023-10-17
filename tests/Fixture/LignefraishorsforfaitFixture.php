<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LignefraishorsforfaitFixture
 */
class LignefraishorsforfaitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'lignefraishorsforfait';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'date' => '2023-10-17',
                'montant' => 1,
                'libelle' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
