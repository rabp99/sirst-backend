<?php
use Migrations\AbstractSeed;

/**
 * Puntos seed.
 */
class PuntosSeed extends AbstractSeed
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
                'codigo' => $faker->unique()->randomNumber(4),
                'descripcion' => $faker->text(60),
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude
            ];
        }
        
        $table = $this->table('puntos');
        $table->insert($data)->save();
    }
}
