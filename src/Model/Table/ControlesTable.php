<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Controles Model
 *
 * @property \App\Model\Table\FichasTable|\Cake\ORM\Association\BelongsTo $Fichas
 *
 * @method \App\Model\Entity\Controle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Controle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Controle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Controle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Controle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Controle findOrCreate($search, callable $callback = null, $options = [])
 */
class ControlesTable extends Table
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

        $this->setTable('controles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fichas', [
            'foreignKey' => 'ficha_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('detalle')
            ->requirePresence('detalle', 'create')
            ->notEmpty('detalle');

        $validator
            ->date('fecha_control')
            ->requirePresence('fecha_control', 'create')
            ->notEmpty('fecha_control');

        $validator
            ->date('fecha_proximo_control')
            ->requirePresence('fecha_proximo_control', 'create')
            ->notEmpty('fecha_proximo_control');

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
        $rules->add($rules->existsIn(['ficha_id'], 'Fichas'));

        return $rules;
    }
}
