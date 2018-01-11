<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoServicios Model
 *
 * @property \App\Model\Table\ServiciosTable|\Cake\ORM\Association\HasMany $Servicios
 *
 * @method \App\Model\Entity\TipoServicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoServicio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoServicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoServicio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoServicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoServicio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoServicio findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoServiciosTable extends Table
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

        $this->setTable('tipo_servicios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Servicios', [
            'foreignKey' => 'tipo_servicio_id'
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
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        return $validator;
    }
}
