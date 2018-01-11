<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Desparasitaciones Model
 *
 * @property \App\Model\Table\FichasTable|\Cake\ORM\Association\BelongsTo $Fichas
 *
 * @method \App\Model\Entity\Desparasitacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Desparasitacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Desparasitacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Desparasitacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Desparasitacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Desparasitacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Desparasitacione findOrCreate($search, callable $callback = null, $options = [])
 */
class DesparasitacionesTable extends Table
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

        $this->setTable('desparasitaciones');
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
            ->date('fecha_proxima_desparasitacion')
            ->requirePresence('fecha_proxima_desparasitacion', 'create')
            ->notEmpty('fecha_proxima_desparasitacion');

        $validator
            ->scalar('dosis')
            ->requirePresence('dosis', 'create')
            ->notEmpty('dosis');

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
