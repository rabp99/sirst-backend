<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centrales Model
 *
 * @method \App\Model\Entity\Centrale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centrale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Centrale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centrale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centrale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centrale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centrale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centrale findOrCreate($search, callable $callback = null, $options = [])
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
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
}
