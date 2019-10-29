<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Antenas Model
 *
 * @property \App\Model\Table\PuntosTable|\Cake\ORM\Association\BelongsTo $Puntos
 * @property \App\Model\Table\EnlacesTable|\Cake\ORM\Association\BelongsTo $Enlaces
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\PuertosTable|\Cake\ORM\Association\BelongsTo $Puertos
 *
 * @method \App\Model\Entity\Antena get($primaryKey, $options = [])
 * @method \App\Model\Entity\Antena newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Antena[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Antena|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Antena saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Antena patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Antena[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Antena findOrCreate($search, callable $callback = null, $options = [])
 */
class AntenasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('antenas');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'punto_id', 'enlace_id', 'modelo_id']);

        $this->belongsTo('Puntos', [
            'foreignKey' => 'punto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Enlaces', [
            'foreignKey' => 'enlace_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Puertos', [
            'foreignKey' => 'puerto_id',
            'joinType' => 'INNER'
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
            ->scalar('ip')
            ->maxLength('ip', 15)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->scalar('device_name')
            ->maxLength('device_name', 30)
            ->requirePresence('device_name', 'create')
            ->notEmptyString('device_name');

        $validator
            ->scalar('mode')
            ->maxLength('mode', 10)
            ->requirePresence('mode', 'create')
            ->notEmptyString('mode');

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
        $rules->add($rules->existsIn(['enlace_id'], 'Enlaces'));
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'));
        $rules->add($rules->existsIn(['puerto_id'], 'Puertos'));

        return $rules;
    }
}
