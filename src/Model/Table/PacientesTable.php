<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pacientes Model
 *
 * @property \App\Model\Table\FichasTable|\Cake\ORM\Association\HasMany $Fichas
 *
 * @method \App\Model\Entity\Paciente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paciente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Paciente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paciente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paciente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paciente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paciente findOrCreate($search, callable $callback = null, $options = [])
 */
class PacientesTable extends Table
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

        $this->setTable('pacientes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Fichas', [
            'foreignKey' => 'paciente_id'
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
            ->scalar('nombre')
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('especie')
            ->requirePresence('especie', 'create')
            ->notEmpty('especie');

        $validator
            ->scalar('raza')
            ->requirePresence('raza', 'create')
            ->notEmpty('raza');

        $validator
            ->scalar('color')
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->integer('edad')
            ->requirePresence('edad', 'create')
            ->notEmpty('edad');

        $validator
            ->integer('peso')
            ->requirePresence('peso', 'create')
            ->notEmpty('peso');

        $validator
            ->scalar('foto')
            ->requirePresence('foto', 'create')
            ->notEmpty('foto');

        return $validator;
    }
}
