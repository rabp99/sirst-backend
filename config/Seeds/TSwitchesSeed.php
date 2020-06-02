<?php
use Migrations\AbstractSeed;

/**
 * TSwitches seed.
 */
class TSwitchesSeed extends AbstractSeed
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
                'modelo_id' => $faker->numberBetween(1, 100),
                'punto_id' => $i + 1,
                'ip' => $faker->ipv4,
                'estado_id' => 1
            ];
        }
        
        $table = $this->table('t_switches');
        $table->insert($data)->save();
    }
}
