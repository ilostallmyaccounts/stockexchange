<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersProductsTable Test Case
 */
class UsersProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersProductsTable
     */
    public $UsersProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersProducts',
        'app.Users',
        'app.Products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersProducts') ? [] : ['className' => UsersProductsTable::class];
        $this->UsersProducts = TableRegistry::getTableLocator()->get('UsersProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersProducts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
