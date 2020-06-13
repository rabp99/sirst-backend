<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\Antena;

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
        $this->setDisplayField('device_name');
        $this->setPrimaryKey('id');

        $this->belongsTo("Puntos")
            ->setForeignKey("punto_id")
            ->setJoinType("INNER");
        
        $this->belongsTo("Enlaces")
            ->setForeignKey("enlace_id")
            ->setJoinType("INNER");

        $this->belongsTo("Modelos")
            ->setForeignKey("modelo_id")
            ->setJoinType("INNER");
        
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
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        // $rules->add($rules->isUnique(['device_name'], 'Ya existe una antena con el mismo device name'));
        $rules->add(
            function ($entity, $options) {
                $count = $this->find()->where(['device_name' => $entity->device_name, 'estado_id' => 1])->count();
                if ($count == 0) {
                    return true;
                } else {
                    return false;
                }
            },
            'deviceNameUnique',
            [
                'errorField' => 'device_name',
                'message' => 'Ya existe una antena activa con el mismo device name'
            ]
        );
        return $rules;
    }
    
    public function ifIpExists(Antena $antena) {
        $count = $this->find()->where(['ip' => $antena->ip, 'estado_id' => 1])->count();
        if ($count > 1) {
            return "Existen $count antenas activas con la misma ip";
        }
        return null;
    }
}
