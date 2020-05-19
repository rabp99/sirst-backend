<?php
use Migrations\AbstractSeed;

/**
 * Puertos seed.
 */
class PuertosSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 300; $i++) {
            $data[] = [
                't_switch_id' => $faker->numberBetween(1, 100),
                'nro_puerto' => $faker->numberBetween(1, 8)
            ];
        }
        
        $table = $this->table('puertos');
        $table->insert($data)->save();
    }
}
