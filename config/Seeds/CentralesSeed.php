<?php
use Migrations\AbstractSeed;

/**
 * Centrales seed.
 */
class CentralesSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 4; $i++) {
            $data[] = [
                'descripcion' => $faker->text(60),
                'nro' => $i + 1
            ];
        }
        
        $table = $this->table('centrales');
        $table->insert($data)->save();
    }
}
