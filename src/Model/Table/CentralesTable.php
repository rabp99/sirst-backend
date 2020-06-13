<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centrales Model
 *
 * @method \App\Model\Entity\Central get($primaryKey, $options = [])
 * @method \App\Model\Entity\Central newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Central[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Central|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Central saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Central patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Central[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Central findOrCreate($search, callable $callback = null, $options = [])
 */
class CentralesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('centrales');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');
        $this->setEntityClass('Central');
        
        
        $this->hasMany("Cruces")
            ->setForeignKey("central_id")
            ->setJoinType("INNER");
                
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
            ->scalar('nro')
            ->maxLength('nro', 1)
            ->requirePresence('nro', 'create')
            ->notEmptyString('nro');

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
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        // $rules->add($rules->isUnique(['descripcion'], 'Ya existe una central con la misma descripción'));
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
                'message' => 'Ya existe una central activa con la misma descripción'
            ]
        );
        // $rules->add($rules->isUnique(['nro'], 'Ya existe una central con el mismo número'));
        $rules->add(
            function ($entity, $options) {
                $count = $this->find()->where(['nro' => $entity->nro, 'estado_id' => 1])->count();
                if ($count == 0) {
                    return true;
                } else {
                    return false;
                }
            },
            'nroUnique',
            [
                'errorField' => 'nro',
                'message' => 'Ya existe una central activa con el mismo número'
            ]
        );
        return $rules;
    }
}
