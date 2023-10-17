<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LignesforfaitsFixture
 */
class LignesforfaitsFixture extends TestFixture
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
                'forfait_id' => 1,
                'quantite' => 1,
            ],
        ];
        parent::init();
    }
}
