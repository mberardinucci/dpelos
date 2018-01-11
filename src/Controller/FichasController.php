<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fichas Controller
 *
 * @property \App\Model\Table\FichasTable $Fichas
 *
 * @method \App\Model\Entity\Ficha[] paginate($object = null, array $settings = [])
 */
class FichasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Pacientes']
        ];
        $fichas = $this->paginate($this->Fichas);

        $this->set(compact('fichas'));
        $this->set('_serialize', ['fichas']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficha id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ficha = $this->Fichas->get($id, [
            'contain' => ['Clientes', 'Pacientes', 'Controles', 'Desparasitaciones']
        ]);

        $this->set('ficha', $ficha);
        $this->set('_serialize', ['ficha']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ficha = $this->Fichas->newEntity();
        if ($this->request->is('post')) {
            $ficha = $this->Fichas->patchEntity($ficha, $this->request->data);
            if ($this->Fichas->save($ficha)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ficha'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ficha'));
            }
        }
        $clientes = $this->Fichas->Clientes->find('list', ['limit' => 200]);
        $pacientes = $this->Fichas->Pacientes->find('list', ['limit' => 200]);
        $this->set(compact('ficha', 'clientes', 'pacientes'));
        $this->set('_serialize', ['ficha']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficha id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ficha = $this->Fichas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ficha = $this->Fichas->patchEntity($ficha, $this->request->data);
            if ($this->Fichas->save($ficha)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ficha'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ficha'));
            }
        }
        $clientes = $this->Fichas->Clientes->find('list', ['limit' => 200]);
        $pacientes = $this->Fichas->Pacientes->find('list', ['limit' => 200]);
        $this->set(compact('ficha', 'clientes', 'pacientes'));
        $this->set('_serialize', ['ficha']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficha id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ficha = $this->Fichas->get($id);
        if ($this->Fichas->delete($ficha)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Ficha'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Ficha'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
