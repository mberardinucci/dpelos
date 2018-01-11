<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingresos Model
 *
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\ServiciosTable|\Cake\ORM\Association\HasMany $Servicios
 * @property \App\Model\Table\VentaProductosTable|\Cake\ORM\Association\HasMany $VentaProductos
 *
 * @method \App\Model\Entity\Ingreso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ingreso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ingreso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ingreso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ingreso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ingreso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ingreso findOrCreate($search, callable $callback = null, $options = [])
 */
class IngresosTable extends Table
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

        $this->setTable('ingresos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Servicios', [
            'foreignKey' => 'ingreso_id'
        ]);
        $this->hasMany('VentaProductos', [
            'foreignKey' => 'ingreso_id'
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
            ->add('fecha', 'valid', ['rule' => ['date','dmy']])
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->scalar('medio_pago')
            ->requirePresence('medio_pago', 'create')
            ->notEmpty('medio_pago');

        $validator
            ->integer('monto')
            ->requirePresence('monto', 'create')
            ->notEmpty('monto');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));

        return $rules;
    }
}
