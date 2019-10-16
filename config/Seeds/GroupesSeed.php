<?php
use Migrations\AbstractSeed;

/**
 * Groupes seed.
 */
class GroupesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'groupname' => 'The Group',
                'file_id' => '4',
                'created' => '2019-10-13',
                'modified' => '2019-10-14',
            ],
        ];

        $table = $this->table('groupes');
        $table->insert($data)->save();
    }
}
