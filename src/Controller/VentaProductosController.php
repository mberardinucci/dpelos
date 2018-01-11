<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VentaProductos Controller
 *
 * @property \App\Model\Table\VentaProductosTable $VentaProductos
 *
 * @method \App\Model\Entity\VentaProducto[] paginate($object = null, array $settings = [])
 */
class VentaProductosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ingresos', 'Productos']
        ];
        $ventaProductos = $this->paginate($this->VentaProductos);

        $this->set(compact('ventaProductos'));
        $this->set('_serialize', ['ventaProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Venta Producto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ventaProducto = $this->VentaProductos->get($id, [
            'contain' => ['Ingresos', 'Productos']
        ]);

        $this->set('ventaProducto', $ventaProducto);
        $this->set('_serialize', ['ventaProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ventaProducto = $this->VentaProductos->newEntity();
        if ($this->request->is('post')) {
            $ventaProducto = $this->VentaProductos->patchEntity($ventaProducto, $this->request->getData());
            if ($this->VentaProductos->save($ventaProducto)) {
                $this->Flash->success(__('The venta producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta producto could not be saved. Please, try again.'));
        }
        $ingresos = $this->VentaProductos->Ingresos->find('list', ['limit' => 200]);
        $productos = $this->VentaProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('ventaProducto', 'ingresos', 'productos'));
        $this->set('_serialize', ['ventaProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Venta Producto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ventaProducto = $this->VentaProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ventaProducto = $this->VentaProductos->patchEntity($ventaProducto, $this->request->getData());
            if ($this->VentaProductos->save($ventaProducto)) {
                $this->Flash->success(__('The venta producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta producto could not be saved. Please, try again.'));
        }
        $ingresos = $this->VentaProductos->Ingresos->find('list', ['limit' => 200]);
        $productos = $this->VentaProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('ventaProducto', 'ingresos', 'productos'));
        $this->set('_serialize', ['ventaProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Venta Producto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ventaProducto = $this->VentaProductos->get($id);
        if ($this->VentaProductos->delete($ventaProducto)) {
            $this->Flash->success(__('The venta producto has been deleted.'));
        } else {
            $this->Flash->error(__('The venta producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
