<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TSwitches Model
 *
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\PuntosTable|\Cake\ORM\Association\BelongsTo $Puntos
 *
 * @method \App\Model\Entity\TSwitch get($primaryKey, $options = [])
 * @method \App\Model\Entity\TSwitch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TSwitch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TSwitch|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TSwitch saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TSwitch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TSwitch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TSwitch findOrCreate($search, callable $callback = null, $options = [])
 */
class TSwitchesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('t_switches');
        $this->setDisplayField('ip');
        $this->setPrimaryKey('id');

        $this->belongsTo('Modelos')
            ->setForeignKey('modelo_id')
            ->setJoinType('INNER');
        
        $this->belongsTo('Puntos')
            ->setForeignKey('punto_id')
            ->setJoinType('INNER');
                
        $this->belongsTo('Estados')
            ->setForeignKey('estado_id')
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
            ->scalar('ip')
            ->maxLength('ip', 15)
            ->allowEmptyString('ip');

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
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'));
        $rules->add($rules->existsIn(['punto_id'], 'Puntos'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        // $rules->add($rules->isUnique(['ip']));
        $rules->add(
            function ($entity, $options) {
                if ($entity->ip == null) {
                    return true;
                }
                $count = $this->find()->where(['ip' => $entity->ip, 'estado_id' => 1])->count();
                if ($count == 0) {
                    return true;
                } else {
                    return false;
                }
            },
            'ipUnique',
            [
                'errorField' => 'ip',
                'message' => 'Ya existe un switch con la misma ip'
            ]
        );
        return $rules;
    }
}
