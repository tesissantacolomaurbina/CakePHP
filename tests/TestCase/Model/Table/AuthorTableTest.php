<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthorTable Test Case
 */
class AuthorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthorTable
     */
    protected $Author;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Author',
        'app.Book',
        'app.User',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Author') ? [] : ['className' => AuthorTable::class];
        $this->Author = TableRegistry::getTableLocator()->get('Author', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Author);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
