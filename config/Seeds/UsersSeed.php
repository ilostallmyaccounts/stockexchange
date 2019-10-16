<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'firstname' => 'Jean',
                'lastname' => 'Robert',
                'email' => 'jr@jr.jr',
                'phone' => '1234567890',
                'password' => '$2y$10$mVrhM.ees.NW7Z4WH2j1MeNUB7p7v/ndAGxm12.M8M6PLfJeBzocK',
                'isadmin' => '0',
                'joindate' => '2019-10-12 23:53:00',
                'validation' => NULL,
                'created' => '2019-10-12',
                'modified' => '2019-10-13',
            ],
            [
                'id' => '3',
                'firstname' => 'Charlie',
                'lastname' => 'Root',
                'email' => 'root@jr.jr',
                'phone' => '1234567890',
                'password' => '$2y$10$BB2KIMus4z1COw1pdcIMXeCbX/2W4mjJHgirNMtbrh5XPziorDP9G',
                'isadmin' => '1',
                'joindate' => '2019-10-12 23:55:00',
                'validation' => NULL,
                'created' => '2019-10-12',
                'modified' => '2019-10-12',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
