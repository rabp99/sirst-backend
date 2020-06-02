<?php
use Migrations\AbstractSeed;

/**
 * Database1 seed.
 */
class Database2Seed extends AbstractSeed
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
        $this->call('EnlacesSeed');
        $this->call('PuntosSeed');
        $this->call('MarcasSeed');
        $this->call('CentralesSeed');
    }
}
