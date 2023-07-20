<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShoesTable Test Case
 */
class ShoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShoesTable
     */
    protected $Shoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Shoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Shoes') ? [] : ['className' => ShoesTable::class];
        $this->Shoes = $this->getTableLocator()->get('Shoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Shoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ShoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
