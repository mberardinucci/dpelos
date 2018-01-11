<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gastos Model
 *
 * @method \App\Model\Entity\Gasto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gasto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gasto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gasto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gasto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gasto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gasto findOrCreate($search, callable $callback = null, $options = [])
 */
class GastosTable extends Table
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

        $this->setTable('gastos');
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
            ->integer('monto')
            ->requirePresence('monto', 'create')
            ->notEmpty('monto');

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        return $validator;
    }
}
