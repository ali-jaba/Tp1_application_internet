<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuelPrices Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $RefFuelTypes
 *
 * @method \App\Model\Entity\FuelPrice get($primaryKey, $options = [])
 * @method \App\Model\Entity\FuelPrice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FuelPrice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuelPrice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuelPrice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuelPrice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FuelPrice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuelPrice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FuelPricesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fuel_prices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RefFuelTypes', [
            'foreignKey' => 'ref_fuel_types_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('Fuel_Price_Date')
            ->requirePresence('Fuel_Price_Date', 'create')
            ->notEmptyDate('Fuel_Price_Date');

        $validator
            ->integer('Unit_Buying_Price')
            ->requirePresence('Unit_Buying_Price', 'create')
            ->notEmptyString('Unit_Buying_Price');

        $validator
            ->integer('Unit_Sales_Price')
            ->requirePresence('Unit_Sales_Price', 'create')
            ->notEmptyString('Unit_Sales_Price');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ref_fuel_types_id'], 'RefFuelTypes'));

        return $rules;
    }
}
