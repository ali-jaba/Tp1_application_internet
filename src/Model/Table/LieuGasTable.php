<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LieuGas Model
 *
 * @method \App\Model\Entity\LieuGa get($primaryKey, $options = [])
 * @method \App\Model\Entity\LieuGa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LieuGa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LieuGa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LieuGa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LieuGa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LieuGa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LieuGa findOrCreate($search, callable $callback = null, $options = [])
 */
class LieuGasTable extends Table
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

        $this->setTable('lieu_gas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
         $this->hasMany('NomGas', [
            'foreignKey' => 'lieu_id',
        ]);
        $this->hasMany('PrixGas', [
            'foreignKey' => 'lieu_id',
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
            ->scalar('lieu')
            ->maxLength('lieu', 255)
            ->requirePresence('lieu', 'create')
            ->notEmptyString('lieu');

        return $validator;
    }
}
