<?php
use Migrations\AbstractSeed;

/**
 * Reguladores seed.
 */
class ReguladoresSeed extends AbstractSeed
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
                'central_id' => $faker->numberBetween(1, 4),
                'punto_id' => $i + 1,
                'puerto_id' => $faker->numberBetween(1, 300),
                'codigo' => $faker->unique()->randomNumber(2),
                'ip' => $faker->ipv4,
                'estado_id' => 1
            ];
        }
        
        $table = $this->table('reguladores');
        $table->insert($data)->save();
    }
}
