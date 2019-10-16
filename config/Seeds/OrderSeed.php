<?php
use Migrations\AbstractSeed;

/**
 * Order seed.
 */
class OrderSeed extends AbstractSeed
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
                'date_purchase' => '2019-10-12 23:54:00',
                'created' => '2019-10-12',
                'modified' => '2019-10-12',
            ],
        ];

        $table = $this->table('orders');
        $table->insert($data)->save();
    }
}
