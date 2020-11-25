<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrixGas Model
 *
 * @property \App\Model\Table\LieuGasTable&\Cake\ORM\Association\BelongsTo $LieuGas
 *
 * @method \App\Model\Entity\PrixGa get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrixGa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrixGa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrixGa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrixGa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrixGa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrixGa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrixGa findOrCreate($search, callable $callback = null, $options = [])
 */
class PrixGasTable extends Table
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

        $this->setTable('prix_gas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('LieuGas', [
            'foreignKey' => 'lieu_id',
            'joinType' => 'INNER',
        ]);
        
         $this->hasMany('NomGas', [
            'foreignKey' => 'prix_id',
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
            ->integer('prix')
            ->requirePresence('prix', 'create')
            ->notEmptyString('prix');

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

        return $rules;
    }
}
