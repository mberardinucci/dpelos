<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parametros Model
 *
 * @method \App\Model\Entity\Parametro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parametro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parametro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parametro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parametro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parametro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parametro findOrCreate($search, callable $callback = null, $options = [])
 */
class ParametrosTable extends Table
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

        $this->setTable('parametros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nombre')
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('valor')
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        return $validator;
    }
}
