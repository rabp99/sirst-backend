<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AntenasFixture
 */
class AntenasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'punto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'enlace_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modelo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'puerto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ip' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'device_name' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mode' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_antenas_puntos1_idx' => ['type' => 'index', 'columns' => ['punto_id'], 'length' => []],
            'fk_antenas_enlaces1_idx' => ['type' => 'index', 'columns' => ['enlace_id'], 'length' => []],
            'fk_antenas_modelos1_idx' => ['type' => 'index', 'columns' => ['modelo_id'], 'length' => []],
            'fk_antenas_puertos1_idx' => ['type' => 'index', 'columns' => ['puerto_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'punto_id', 'enlace_id', 'modelo_id'], 'length' => []],
            'fk_antenas_enlaces1' => ['type' => 'foreign', 'columns' => ['enlace_id'], 'references' => ['enlaces', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_antenas_modelos1' => ['type' => 'foreign', 'columns' => ['modelo_id'], 'references' => ['modelos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_antenas_puertos1' => ['type' => 'foreign', 'columns' => ['puerto_id'], 'references' => ['puertos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_antenas_puntos1' => ['type' => 'foreign', 'columns' => ['punto_id'], 'references' => ['puntos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'punto_id' => 1,
                'enlace_id' => 1,
                'modelo_id' => 1,
                'puerto_id' => 1,
                'ip' => 'Lorem ipsum d',
                'device_name' => 'Lorem ipsum dolor sit amet',
                'mode' => 'Lorem ip'
            ],
        ];
        parent::init();
    }
}
