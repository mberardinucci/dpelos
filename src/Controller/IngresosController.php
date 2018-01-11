<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Ingresos Controller
 *
 * @property \App\Model\Table\IngresosTable $Ingresos
 *
 * @method \App\Model\Entity\Ingreso[] paginate($object = null, array $settings = [])
 */
class IngresosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        

        $ingresos = $this->Ingresos->find('all', [
                'sort' => ['fecha' => 'ASC'],
                'contain' => ['Clientes']
            ]);

       

        $this->set('ingresos', $ingresos);

     
    }

    /**
     * View method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingreso = $this->Ingresos->get($id, [
            'contain' => ['Clientes', 'Servicios', 'VentaProductos']
        ]);

        $this->set('ingreso', $ingreso);
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        $this->loadModel('VentaProductos');
        $this->loadModel('Servicios');	
        $ingreso = $this->Ingresos->newEntity();
        if ($this->request->is('post')) {
            $ingreso = $this->Ingresos->patchEntity($ingreso, $this->request->getData());                                    
            $es_valido = $this->validoIngreso($this->request->getData());
            //obtengo el monto total
            $ingreso->monto  = $this->getMonto($this->request->getData());            
            //creo la fecha
            $ingreso->fecha = new Time($this->request->data['fecha']);
            
            if($es_valido){
                if ($this->Ingresos->save($ingreso)) {                
                    $ingreso_id = $ingreso->id;                
                    //aqui debo guardar los productos                                
                    foreach($this->request->data['VentaProducto'] as $ventaProducto) {
                        
                        if($ventaProducto['nombre']!=''){                        
                            //obtengo el producto desde la tabla de productos
                            
                            $producto_tabla = $this->getProducto($ventaProducto['nombre']);
                            
                            //guardo la venta del producto
                            $ventaProductosTable = TableRegistry::get('VentaProductos');
                            $producto = $ventaProductosTable->newEntity();
                            $producto->nombre = $producto_tabla->nombre;
                            $producto->valor = $producto_tabla->valor_venta;
                            $producto->cantidad = $ventaProducto['cantidad'];                                            
                            $producto->ingreso_id = $ingreso_id;
                            $producto->producto_id = $producto_tabla->id;
                            //debug($producto);exit;                                    
                            $ventaProductosTable->save($producto);
                            
                            //descuento del inventario
                            $this->descuentoStock($producto->producto_id, $ventaProducto['cantidad']);                                                                    
                        }
                        
                    }
                    //aqui debo guardar el servicio
                    if($this->request->data['valorServicio'] != '' and $this->request->data['nombreServicio'] != ''){
                        $serviciosTable = TableRegistry::get('Servicios');
                        $servicio = $serviciosTable->newEntity();
                        $servicio->descripcion = $this->request->data['nombreServicio'];
                        $servicio->valor = $this->request->data['valorServicio'];
                        $servicio->tipo_servicio_id = $this->request->data['tipo'];
                        $servicio->ingreso_id = $ingreso_id;                    
                        $serviciosTable->save($servicio);                    
                    }
    
                    $this->Flash->success(__('Guardado con exito'));
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Existió un problema al guardar. Favor intentar nuevamente'));
            }
            $this->Flash->error(__('Debe ingresar al menos un servicio o producto'));
        }
        $clientes = $this->Ingresos->Clientes->find('list', ['limit' => 200]);
        $productos = $this->getProductos();
        $tipos = $this->getTiposServicio();
        
        $this->set(compact('ingreso', 'clientes', 'productos', 'tipos'));
        $this->set('_serialize', ['ingreso']);
    }
    public function validoIngreso($data){        
        $valido = false;
        if($data['valorServicio'] != '' and $data['nombreServicio'] != ''){
            $valido = true;
        }
        if(!$valido){
            foreach($data['VentaProducto'] as $ventaProducto) {
                if($ventaProducto['nombre']!=''){           
                    $valido = true;
                    break;
                }
            }
        }
        return $valido;
    }
    public function getTiposServicio()
    {
        $this->loadModel('TipoServicios');
        $query = $this->TipoServicios->find('all', ['limit' => 200]);
        $tipos=array();
        foreach ($query as $row) {
            $tipos [$row['id']] =  $row['nombre'] ;               
        }
        return $tipos;
    }
    public function descuentoStock($id, $cantidad)
    {
        //$this->loadModel('Productos');
        $productosTable = TableRegistry::get('Productos');
        $p = $productosTable->get($id);
        $p->stock = ($p->stock - $cantidad);
        $productosTable->save($p);        
    }
    public function getMonto($data)
    {
        $monto = 0;
        //productos
        foreach($this->request->data['VentaProducto'] as $ventaProducto) {
             if($ventaProducto['nombre']!=''){           
                $producto_tabla = $this->getProducto($ventaProducto['nombre']);
                $monto = $monto + $producto_tabla->valor_venta*$ventaProducto['cantidad'];
             }
        }
        //servicio
        if($data['valorServicio'] != '' and $data['nombreServicio'] != ''){
            $monto = $monto + $data['valorServicio'];
        }    
        return $monto;
    }
    public function getProducto($id)
    {
        $this->loadModel('Productos');
        
        $producto = $this->Productos->get($id);
        return $producto;
    }
    public function getProductos()
    {
        $this->loadModel('Productos');
        $query = $this->Productos->find('all', ['limit' => 200]);
        $productos=array();

        foreach ($query as $row) {
            $productos[$row['id']] =  $row['nombre'] . ' - ' . $row['valor_venta'];            
        }        
        return $productos;
    }
    /**
     * Edit method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingreso = $this->Ingresos->get($id, [
            'contain' => []
        ]);
        
        $ingreso->fecha = $ingreso->fecha->i18nFormat('dd-MM-yyyy');
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingreso = $this->Ingresos->patchEntity($ingreso, $this->request->getData());
            if ($this->Ingresos->save($ingreso)) {
                $this->Flash->success(__('The ingreso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingreso could not be saved. Please, try again.'));
        }
        $clientes = $this->Ingresos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('ingreso', 'clientes'));
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingreso = $this->Ingresos->get($id);
        if ($this->Ingresos->delete($ingreso)) {
            $this->Flash->success(__('The ingreso has been deleted.'));
        } else {
            $this->Flash->error(__('The ingreso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
