<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Controles Controller
 *
 * @property \App\Model\Table\ControlesTable $Controles
 *
 * @method \App\Model\Entity\Controle[] paginate($object = null, array $settings = [])
 */
class ControlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fichas']
        ];
        $controles = $this->paginate($this->Controles);

        $this->set(compact('controles'));
        $this->set('_serialize', ['controles']);
    }

    /**
     * View method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $controle = $this->Controles->get($id, [
            'contain' => ['Fichas']
        ]);

        $this->set('controle', $controle);
        $this->set('_serialize', ['controle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controle = $this->Controles->newEntity();
        if ($this->request->is('post')) {
            $controle = $this->Controles->patchEntity($controle, $this->request->data);
            if ($this->Controles->save($controle)) {
                $this->Flash->success(__('The {0} has been saved.', 'Controle'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Controle'));
            }
        }
        $fichas = $this->Controles->Fichas->find('list', ['limit' => 200]);
        $this->set(compact('controle', 'fichas'));
        $this->set('_serialize', ['controle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controle = $this->Controles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controle = $this->Controles->patchEntity($controle, $this->request->data);
            if ($this->Controles->save($controle)) {
                $this->Flash->success(__('The {0} has been saved.', 'Controle'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Controle'));
            }
        }
        $fichas = $this->Controles->Fichas->find('list', ['limit' => 200]);
        $this->set(compact('controle', 'fichas'));
        $this->set('_serialize', ['controle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $controle = $this->Controles->get($id);
        if ($this->Controles->delete($controle)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Controle'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Controle'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
