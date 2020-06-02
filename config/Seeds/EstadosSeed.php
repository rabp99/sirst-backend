<?php
use Migrations\AbstractSeed;

/**
 * Estados seed.
 */
class EstadosSeed extends AbstractSeed
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
        $data = [
            [
                'descripcion' => 'Activo'
            ],
            [
                'descripcion' => 'Deshabilitado'
            ],
        ];
        
        $table = $this->table('estados');
        $table->insert($data)->save();
    }
}