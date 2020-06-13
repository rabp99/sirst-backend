<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modelos Model
 *
 * @property \App\Model\Table\MarcasTable|\Cake\ORM\Association\BelongsTo $Marcas
 *
 * @method \App\Model\Entity\Modelo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modelo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modelo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modelo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo findOrCreate($search, callable $callback = null, $options = [])
 */
class ModelosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('modelos');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->belongsTo('Marcas')
            ->setForeignKey('marca_id')
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
            ->scalar('descripcion')
            ->maxLength('descripcion', 60)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        $validator
            ->scalar('observacion')
            ->maxLength('observacion', 60)
            ->requirePresence('observacion', 'create')
            ->notEmptyString('observacion');

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
        $rules->add($rules->existsIn(['marca_id'], 'Marcas'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        // $rules->add($rules->isUnique(['descripcion'], 'Ya existe un modelo con la misma descripción'));
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
                'message' => 'Ya existe un modelo activo con la misma descripción'
            ]
        );
        return $rules;
    }
}
