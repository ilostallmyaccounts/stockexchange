<?php
use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
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
                'name' => 'Produit 101',
                'user_id' => '1',
                'price' => '19',
                'created' => '2019-10-12',
                'modified' => '2019-10-12',
            ],
            [
                'id' => '3',
                'name' => 'Test',
                'user_id' => '1',
                'price' => '79',
                'created' => '2019-10-13',
                'modified' => '2019-10-13',
            ],
            [
                'id' => '4',
                'name' => 'Test 2',
                'user_id' => '1',
                'price' => '39',
                'created' => '2019-10-13',
                'modified' => '2019-10-13',
            ],
            [
                'id' => '5',
                'name' => 'qwerty',
                'user_id' => '1',
                'price' => '12',
                'created' => '2019-10-13',
                'modified' => '2019-10-13',
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
