<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FicheFixture
 */
class FicheFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'fiche';
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
                'user_id' => '115df62e-4449-4155-aeda-fdf495f24013',
                'etat_id' => 1,
                'moisannee' => 'Lorem ipsum dolor ',
                'nbjustificatifs' => 1,
                'montantvalide' => 1,
                'datemodif' => '2023-10-17',
            ],
        ];
        parent::init();
    }
}
