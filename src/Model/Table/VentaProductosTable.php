<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VentaProductos Model
 *
 * @property \App\Model\Table\IngresosTable|\Cake\ORM\Association\BelongsTo $Ingresos
 * @property \App\Model\Table\ProductosTable|\Cake\ORM\Association\BelongsTo $Productos
 *
 * @method \App\Model\Entity\VentaProducto get($primaryKey, $options = [])
 * @method \App\Model\Entity\VentaProducto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VentaProducto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VentaProducto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VentaProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VentaProducto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VentaProducto findOrCreate($search, callable $callback = null, $options = [])
 */
class VentaProductosTable extends Table
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

        $this->setTable('venta_productos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ingresos', [
            'foreignKey' => 'ingreso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Productos', [
            'foreignKey' => 'producto_id',
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
            ->scalar('nombre')
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->integer('valor')
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

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
        $rules->add($rules->existsIn(['ingreso_id'], 'Ingresos'));
        $rules->add($rules->existsIn(['producto_id'], 'Productos'));

        return $rules;
    }
}
