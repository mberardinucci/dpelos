<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoServicios Controller
 *
 * @property \App\Model\Table\TipoServiciosTable $TipoServicios
 *
 * @method \App\Model\Entity\TipoServicio[] paginate($object = null, array $settings = [])
 */
class TipoServiciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoServicios = $this->paginate($this->TipoServicios);

        $this->set(compact('tipoServicios'));
        $this->set('_serialize', ['tipoServicios']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Servicio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoServicio = $this->TipoServicios->get($id, [
            'contain' => ['Servicios']
        ]);

        $this->set('tipoServicio', $tipoServicio);
        $this->set('_serialize', ['tipoServicio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoServicio = $this->TipoServicios->newEntity();
        if ($this->request->is('post')) {
            $tipoServicio = $this->TipoServicios->patchEntity($tipoServicio, $this->request->getData());
            if ($this->TipoServicios->save($tipoServicio)) {
                $this->Flash->success(__('The tipo servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo servicio could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoServicio'));
        $this->set('_serialize', ['tipoServicio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Servicio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoServicio = $this->TipoServicios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoServicio = $this->TipoServicios->patchEntity($tipoServicio, $this->request->getData());
            if ($this->TipoServicios->save($tipoServicio)) {
                $this->Flash->success(__('The tipo servicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo servicio could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoServicio'));
        $this->set('_serialize', ['tipoServicio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Servicio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoServicio = $this->TipoServicios->get($id);
        if ($this->TipoServicios->delete($tipoServicio)) {
            $this->Flash->success(__('The tipo servicio has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo servicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
