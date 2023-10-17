<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ForfaitFixture
 */
class ForfaitFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'forfait';
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
                'type' => 'Lorem ipsum dolor sit amet',
                'prix' => 1,
            ],
        ];
        parent::init();
    }
}
