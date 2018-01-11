<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Peluquerias Model
 *
 * @property \App\Model\Table\FichasTable|\Cake\ORM\Association\BelongsTo $Fichas
 *
 * @method \App\Model\Entity\Peluqueria get($primaryKey, $options = [])
 * @method \App\Model\Entity\Peluqueria newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Peluqueria[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Peluqueria|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Peluqueria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Peluqueria[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Peluqueria findOrCreate($search, callable $callback = null, $options = [])
 */
class PeluqueriasTable extends Table
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

        $this->setTable('peluquerias');
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
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->date('fecha_proxima_peluqueria')
            ->requirePresence('fecha_proxima_peluqueria', 'create')
            ->notEmpty('fecha_proxima_peluqueria');

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

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
