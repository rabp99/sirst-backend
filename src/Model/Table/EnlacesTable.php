<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enlaces Model
 *
 * @property \App\Model\Table\AntenasTable|\Cake\ORM\Association\HasMany $Antenas
 *
 * @method \App\Model\Entity\Enlace get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enlace newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Enlace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enlace|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enlace saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enlace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enlace[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enlace findOrCreate($search, callable $callback = null, $options = [])
 */
class EnlacesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('enlaces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Antenas', [
            'foreignKey' => 'enlace_id'
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
            ->scalar('ssid')
            ->maxLength('ssid', 10)
            ->requirePresence('ssid', 'create')
            ->notEmptyString('ssid');

        $validator
            ->scalar('channel_width')
            ->maxLength('channel_width', 8)
            ->requirePresence('channel_width', 'create')
            ->notEmptyString('channel_width');

        return $validator;
    }
}
