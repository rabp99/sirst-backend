<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TSwitchesFixture
 */
class TSwitchesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'modelo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'punto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ip' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_switches_puntos1_idx' => ['type' => 'index', 'columns' => ['punto_id'], 'length' => []],
            'fk_switches_modelos1_idx' => ['type' => 'index', 'columns' => ['modelo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'modelo_id', 'punto_id'], 'length' => []],
            'ip_UNIQUE' => ['type' => 'unique', 'columns' => ['ip'], 'length' => []],
            'fk_switches_modelos1' => ['type' => 'foreign', 'columns' => ['modelo_id'], 'references' => ['modelos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_switches_puntos1' => ['type' => 'foreign', 'columns' => ['punto_id'], 'references' => ['puntos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'modelo_id' => 1,
                'punto_id' => 1,
                'ip' => 'Lorem ipsum d'
            ],
        ];
        parent::init();
    }
}
