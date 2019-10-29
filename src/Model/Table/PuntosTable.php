<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Puntos Model
 *
 * @property \App\Model\Table\AntenasTable|\Cake\ORM\Association\HasMany $Antenas
 * @property \App\Model\Table\CrucesTable|\Cake\ORM\Association\HasMany $Cruces
 * @property \App\Model\Table\ReguladoresTable|\Cake\ORM\Association\HasMany $Reguladores
 * @property \App\Model\Table\TSwitchesTable|\Cake\ORM\Association\HasMany $TSwitches
 *
 * @method \App\Model\Entity\Punto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Punto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Punto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Punto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Punto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Punto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Punto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Punto findOrCreate($search, callable $callback = null, $options = [])
 */
class PuntosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('puntos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Antenas', [
            'foreignKey' => 'punto_id'
        ]);
        $this->hasMany('Cruces', [
            'foreignKey' => 'punto_id'
        ]);
        $this->hasMany('Reguladores', [
            'foreignKey' => 'punto_id'
        ]);
        $this->hasMany('TSwitches', [
            'foreignKey' => 'punto_id'
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
            ->scalar('codigo')
            ->maxLength('codigo', 4)
            ->requirePresence('codigo', 'create')
            ->notEmptyString('codigo')
            ->add('codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 60)
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('latitud')
            ->maxLength('latitud', 20)
            ->requirePresence('latitud', 'create')
            ->notEmptyString('latitud');

        $validator
            ->scalar('longitud')
            ->maxLength('longitud', 20)
            ->requirePresence('longitud', 'create')
            ->notEmptyString('longitud');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['codigo']));

        return $rules;
    }
}
