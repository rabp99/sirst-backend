<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reguladores Model
 *
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\CentralesTable|\Cake\ORM\Association\BelongsTo $Centrales
 * @property \App\Model\Table\PuntosTable|\Cake\ORM\Association\BelongsTo $Puntos
 * @property \App\Model\Table\PuertosTable|\Cake\ORM\Association\BelongsTo $Puertos
 *
 * @method \App\Model\Entity\Reguladore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reguladore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reguladore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reguladore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reguladore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reguladore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reguladore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reguladore findOrCreate($search, callable $callback = null, $options = [])
 */
class ReguladoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('reguladores');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('id');
        $this->setEntityClass('regulador');

        $this->belongsTo('Modelos')
            ->setForeignKey('modelo_id')
            ->setJoinType('INNER');

        $this->belongsTo('Centrales')
            ->setForeignKey('central_id')
            ->setJoinType('INNER')
            ->setProperty('central');

        $this->belongsTo('Puntos')
            ->setForeignKey('punto_id')
            ->setJoinType('INNER');

        $this->belongsTo('Puertos')
            ->setForeignKey('puerto_id')
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
            ->scalar('codigo')
            ->maxLength('codigo', 2)
            ->requirePresence('codigo', 'create')
            ->notEmptyString('codigo');

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
        $rules->add($rules->existsIn(['central_id'], 'Centrales'));
        $rules->add($rules->existsIn(['punto_id'], 'Puntos'));
        $rules->add($rules->existsIn(['puerto_id'], 'Puertos'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        // $rules->add($rules->isUnique(['codigo'], 'Ya existe un regulador con el mismo código'));
        $rules->add(
            function ($entity, $options) {
                $count = $this->find()->where(['codigo' => $entity->codigo, 'estado_id' => 1])->count();
                if ($count == 0) {
                    return true;
                } else {
                    return false;
                }
            },
            'codigoUnique',
            [
                'errorField' => 'codigo',
                'message' => 'Ya existe un regulador con el mismo código'
            ]
        );
        // $rules->add($rules->isUnique(['ip'], 'Ya existe un regulador con la misma ip'));
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
                'message' => 'Ya existe un regulador con la misma ip'
            ]
        );
        
        return $rules;
    }
}
