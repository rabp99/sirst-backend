<?php
use Migrations\AbstractSeed;

/**
 * Modelos seed.
 */
class ModelosSeed extends AbstractSeed
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
                'marca_id' => $faker->numberBetween(1, 100),
                'descripcion' => $faker->text(60),
                'observacion' => $faker->text(60)
            ];
        }
        
        $table = $this->table('modelos');
        $table->insert($data)->save();
    }
}
