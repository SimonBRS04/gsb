<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LigneforfaitFixture
 */
class LigneforfaitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ligneforfait';
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
