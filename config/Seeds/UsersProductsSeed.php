<?php
use Migrations\AbstractSeed;

/**
 * UsersProducts seed.
 */
class UsersProductsSeed extends AbstractSeed
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
                'user_id' => '1',
                'product_id' => '3',
                'created' => '2019-10-13',
                'modified' => '2019-10-13',
            ],
            [
                'id' => '2',
                'user_id' => '1',
                'product_id' => '4',
                'created' => '2019-10-13',
                'modified' => '2019-10-13',
            ],
        ];

        $table = $this->table('users_products');
        $table->insert($data)->save();
    }
}
