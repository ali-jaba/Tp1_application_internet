<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefFuelTypes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\RefFuelType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefFuelType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefFuelType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefFuelType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefFuelType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefFuelType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefFuelType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefFuelType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RefFuelTypesTable extends Table
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

        $this->setTable('ref_fuel_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        parent::initialize($config);        
        $this->addBehavior('Translate', ['fields' => ['Fuel_Type_Name', 'Fuel_Type_Description']]);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('NomGas', [
            'foreignKey' => 'NomGas_id',
            'joinType' => 'INNER',
        ]);
        
        
        $this->hasMany('transactions', [
            'foreignKey' => 'ref_fuel_types_id',
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
            ->scalar('Fuel_Type_Name')
            ->maxLength('Fuel_Type_Name', 255)
            ->requirePresence('Fuel_Type_Name', 'create')
            ->notEmptyString('Fuel_Type_Name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('Fuel_Type_Description')
            ->requirePresence('Fuel_Type_Description', 'create')
            ->notEmptyString('Fuel_Type_Description');

        $validator
            ->numeric('Unit_Buying_Price')
            ->requirePresence('Unit_Buying_Price', 'create')
            ->notEmptyString('Unit_Buying_Price');

        $validator
            ->numeric('Unit_Sales_Price')
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
