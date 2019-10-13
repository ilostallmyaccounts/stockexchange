<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersGroupesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersGroupesTable Test Case
 */
class UsersGroupesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersGroupesTable
     */
    public $UsersGroupes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersGroupes',
        'app.Users',
        'app.Groupes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersGroupes') ? [] : ['className' => UsersGroupesTable::class];
        $this->UsersGroupes = TableRegistry::getTableLocator()->get('UsersGroupes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersGroupes);

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
