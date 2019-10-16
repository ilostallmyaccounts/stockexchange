<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'name' => 'itop.txt',
                'path' => 'uploads/files/',
                'created' => '2019-10-14 00:27:21',
                'modified' => '2019-10-14 00:27:21',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'e.html',
                'path' => 'uploads/files/',
                'created' => '2019-10-14 00:48:11',
                'modified' => '2019-10-14 00:48:11',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => '6b0c7491d0776cf40dc0f455b937edf8.jpg',
                'path' => 'uploads/files/',
                'created' => '2019-10-14 00:52:18',
                'modified' => '2019-10-14 00:52:18',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'YYKGVl2.jpg',
                'path' => 'uploads/files/',
                'created' => '2019-10-14 01:02:52',
                'modified' => '2019-10-14 01:02:52',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
