<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GroupesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GroupesTable Test Case
 */
class GroupesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GroupesTable
     */
    public $Groupes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Groupes',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Groupes') ? [] : ['className' => GroupesTable::class];
        $this->Groupes = TableRegistry::getTableLocator()->get('Groupes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Groupes);

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
}
