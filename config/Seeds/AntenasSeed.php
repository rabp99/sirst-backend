<?php
use Migrations\AbstractSeed;

/**
 * Antenas seed.
 */
class AntenasSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'punto_id' => $faker->numberBetween(1, 100),
                'enlace_id' => $faker->numberBetween(1, 100),
                'modelo_id' => $faker->numberBetween(1, 100),
                'puerto_id' => $faker->numberBetween(1, 300),
                'ip' => $faker->ipv4,
                'device_name' => $faker->text(30),
                'mode' => $faker->randomElement($array = ['ST', 'AP', 'ST WDS', 'AP WDS']),
                'estado_id' => 1
            ];
        }
        
        $table = $this->table('antenas');
        $table->insert($data)->save();
    }
}
