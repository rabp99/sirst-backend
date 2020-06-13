<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cruces Model
 *
 * @property \App\Model\Table\PuntosTable|\Cake\ORM\Association\BelongsTo $Puntos
 * @property \App\Model\Table\ReguladoresTable|\Cake\ORM\Association\BelongsTo $Reguladores
 *
 * @method \App\Model\Entity\Cruce get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cruce newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cruce[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cruce|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cruce saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cruce patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cruce[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cruce findOrCreate($search, callable $callback = null, $options = [])
 */
class CrucesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('cruces');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->belongsTo('Puntos')
            ->setForeignKey("punto_id")
            ->setJoinType("INNER");
        
        $this->belongsTo('Reguladores')
            ->setForeignKey("regulador_id")
            ->setJoinType("INNER")
            ->setProperty('regulador');
                
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
            ->maxLength('codigo', 4)
            ->requirePresence('codigo', 'create')
            ->notEmptyString('codigo');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 60)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

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
        $rules->add($rules->existsIn(['punto_id'], 'Puntos'));
        $rules->add($rules->existsIn(['regulador_id'], 'Reguladores'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        // $rules->add($rules->isUnique(['codigo'], 'Ya existe un cruce con el mismo código'));
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
                'message' => 'Ya existe un cruce activo con el mismo código'
            ]
        );
        // $rules->add($rules->isUnique(['descripcion'], 'Ya existe un cruce con la misma descripción'));
        $rules->add(
            function ($entity, $options) {
                $count = $this->find()->where(['descripcion' => $entity->descripcion, 'estado_id' => 1])->count();
                if ($count == 0) {
                    return true;
                } else {
                    return false;
                }
            },
            'descripcionUnique',
            [
                'errorField' => 'descripcion',
                'message' => 'Ya existe un cruce activo con la misma descripción'
            ]
        );
            
        return $rules;
    }
}
