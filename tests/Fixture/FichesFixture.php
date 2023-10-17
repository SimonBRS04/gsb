<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FichesFixture
 */
class FichesFixture extends TestFixture
{
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
                'user_id' => '2c6bb8d1-b25e-493a-b760-34e38dcba9e9',
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
