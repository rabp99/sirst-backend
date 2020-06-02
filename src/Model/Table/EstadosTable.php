<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estados Model
 *
 * @property \App\Model\Table\AntenasTable|\Cake\ORM\Association\HasMany $Antenas
 * @property \App\Model\Table\CentralesTable|\Cake\ORM\Association\HasMany $Centrales
 * @property \App\Model\Table\CrucesTable|\Cake\ORM\Association\HasMany $Cruces
 * @property \App\Model\Table\EnlacesTable|\Cake\ORM\Association\HasMany $Enlaces
 * @property \App\Model\Table\MarcasTable|\Cake\ORM\Association\HasMany $Marcas
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\HasMany $Modelos
 * @property \App\Model\Table\PuntosTable|\Cake\ORM\Association\HasMany $Puntos
 * @property \App\Model\Table\ReguladoresTable|\Cake\ORM\Association\HasMany $Reguladores
 * @property \App\Model\Table\TSwitchesTable|\Cake\ORM\Association\HasMany $TSwitches
 *
 * @method \App\Model\Entity\Estado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estado findOrCreate($search, callable $callback = null, $options = [])
 */
class EstadosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('estados');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->hasMany('Antenas', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Centrales', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Cruces', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Enlaces', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Marcas', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Modelos', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Puntos', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Reguladores', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('TSwitches', [
            'foreignKey' => 'estado_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 10)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        return $validator;
    }
}
