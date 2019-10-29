<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReguladoresFixture
 */
class ReguladoresFixture extends TestFixture
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
        'central_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'punto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'puerto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codigo' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'ip' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_reguladores_puntos1_idx' => ['type' => 'index', 'columns' => ['punto_id'], 'length' => []],
            'fk_reguladores_modelos1_idx' => ['type' => 'index', 'columns' => ['modelo_id'], 'length' => []],
            'fk_reguladores_puertos1_idx' => ['type' => 'index', 'columns' => ['puerto_id'], 'length' => []],
            'fk_reguladores_centrales1_idx' => ['type' => 'index', 'columns' => ['central_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'modelo_id'], 'length' => []],
            'fk_reguladores_centrales1' => ['type' => 'foreign', 'columns' => ['central_id'], 'references' => ['centrales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_reguladores_modelos1' => ['type' => 'foreign', 'columns' => ['modelo_id'], 'references' => ['modelos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_reguladores_puertos1' => ['type' => 'foreign', 'columns' => ['puerto_id'], 'references' => ['puertos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_reguladores_puntos1' => ['type' => 'foreign', 'columns' => ['punto_id'], 'references' => ['puntos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'central_id' => 1,
                'punto_id' => 1,
                'puerto_id' => 1,
                'codigo' => 'Lo',
                'ip' => 'Lorem ipsum d'
            ],
        ];
        parent::init();
    }
}
