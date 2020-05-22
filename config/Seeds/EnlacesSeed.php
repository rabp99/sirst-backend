<?php
use Migrations\AbstractSeed;

/**
 * Enlaces seed.
 */
class EnlacesSeed extends AbstractSeed
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
    public function run() {
        $faker = Faker\Factory::create();
        $data = [];
        
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'ssid' => $faker->unique()->text(10),
                'channel_width' => $faker->randomElement($array = ['10MHZ', '20MHZ', '40MHZ', '20/40MHZ'])
            ];
        }
        
        $table = $this->table('enlaces');
        $table->insert($data)->save();
    }
}