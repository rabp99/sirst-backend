<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Puertos Model
 *
 * @property \App\Model\Table\TSwitchesTable|\Cake\ORM\Association\BelongsTo $TSwitches
 *
 * @method \App\Model\Entity\Puerto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Puerto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Puerto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Puerto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Puerto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Puerto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Puerto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Puerto findOrCreate($search, callable $callback = null, $options = [])
 */
class PuertosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('puertos');
        $this->setDisplayField('nro_puerto');
        $this->setPrimaryKey('id');

        $this->belongsTo('TSwitches')
            ->setForeignKey('t_switch_id')
            ->setJoinType('INNER');
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
            ->scalar('nro_puerto')
            ->maxLength('nro_puerto', 1)
            ->requirePresence('nro_puerto', 'create')
            ->notEmptyString('nro_puerto');

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
        $rules->add($rules->existsIn(['t_switche_id'], 'TSwitches'));

        return $rules;
    }
}
