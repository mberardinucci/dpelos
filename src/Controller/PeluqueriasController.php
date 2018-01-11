<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Peluquerias Controller
 *
 * @property \App\Model\Table\PeluqueriasTable $Peluquerias
 *
 * @method \App\Model\Entity\Peluqueria[] paginate($object = null, array $settings = [])
 */
class PeluqueriasController extends AppController
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
        $peluquerias = $this->paginate($this->Peluquerias);

        $this->set(compact('peluquerias'));
        $this->set('_serialize', ['peluquerias']);
    }

    /**
     * View method
     *
     * @param string|null $id Peluqueria id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peluqueria = $this->Peluquerias->get($id, [
            'contain' => ['Fichas']
        ]);

        $this->set('peluqueria', $peluqueria);
        $this->set('_serialize', ['peluqueria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peluqueria = $this->Peluquerias->newEntity();
        if ($this->request->is('post')) {
            $peluqueria = $this->Peluquerias->patchEntity($peluqueria, $this->request->data);
            if ($this->Peluquerias->save($peluqueria)) {
                $this->Flash->success(__('The {0} has been saved.', 'Peluqueria'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Peluqueria'));
            }
        }
        $fichas = $this->Peluquerias->Fichas->find('list', ['limit' => 200]);
        $this->set(compact('peluqueria', 'fichas'));
        $this->set('_serialize', ['peluqueria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Peluqueria id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peluqueria = $this->Peluquerias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peluqueria = $this->Peluquerias->patchEntity($peluqueria, $this->request->data);
            if ($this->Peluquerias->save($peluqueria)) {
                $this->Flash->success(__('The {0} has been saved.', 'Peluqueria'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Peluqueria'));
            }
        }
        $fichas = $this->Peluquerias->Fichas->find('list', ['limit' => 200]);
        $this->set(compact('peluqueria', 'fichas'));
        $this->set('_serialize', ['peluqueria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Peluqueria id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peluqueria = $this->Peluquerias->get($id);
        if ($this->Peluquerias->delete($peluqueria)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Peluqueria'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Peluqueria'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
