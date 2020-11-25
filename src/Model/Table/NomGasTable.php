<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NomGas Model
 *
 * @property \App\Model\Table\LieuGasTable&\Cake\ORM\Association\BelongsTo $LieuGas
 * @property \App\Model\Table\PrixGasTable&\Cake\ORM\Association\BelongsTo $PrixGas
 *
 * @method \App\Model\Entity\NomGa get($primaryKey, $options = [])
 * @method \App\Model\Entity\NomGa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NomGa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NomGa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NomGa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NomGa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NomGa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NomGa findOrCreate($search, callable $callback = null, $options = [])
 */
class NomGasTable extends Table
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

        $this->setTable('nom_gas');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');
        
         $this->hasMany('RefFuelTypes', [
            'foreignKey' => 'NomGas_id',
        ]);

        $this->belongsTo('LieuGas', [
            'foreignKey' => 'lieu_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PrixGas', [
            'foreignKey' => 'prix_id',
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
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

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
        $rules->add($rules->existsIn(['lieu_id'], 'LieuGas'));
        $rules->add($rules->existsIn(['prix_id'], 'PrixGas'));

        return $rules;
    }
}
