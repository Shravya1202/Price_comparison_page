<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PricesFixture
 */
class PricesFixture extends TestFixture
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
                'price_id' => 1,
                'shoes_id' => 1,
                'store_id' => 1,
                'price' => 1.5,
                'created_at' => 1689761599,
                'updated_at' => 1689761599,
            ],
        ];
        parent::init();
    }
}
