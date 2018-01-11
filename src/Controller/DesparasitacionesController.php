<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Desparasitaciones Controller
 *
 * @property \App\Model\Table\DesparasitacionesTable $Desparasitaciones
 *
 * @method \App\Model\Entity\Desparasitacione[] paginate($object = null, array $settings = [])
 */
class DesparasitacionesController extends AppController
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
        $desparasitaciones = $this->paginate($this->Desparasitaciones);

        $this->set(compact('desparasitaciones'));
        $this->set('_serialize', ['desparasitaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Desparasitacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $desparasitacione = $this->Desparasitaciones->get($id, [
            'contain' => ['Fichas']
        ]);

        $this->set('desparasitacione', $desparasitacione);
        $this->set('_serialize', ['desparasitacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $desparasitacione = $this->Desparasitaciones->newEntity();
        if ($this->request->is('post')) {
            $desparasitacione = $this->Desparasitaciones->patchEntity($desparasitacione, $this->request->data);
            if ($this->Desparasitaciones->save($desparasitacione)) {
                $this->Flash->success(__('The {0} has been saved.', 'Desparasitacione'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Desparasitacione'));
            }
        }
        $fichas = $this->Desparasitaciones->Fichas->find('list', ['limit' => 200]);
        $this->set(compact('desparasitacione', 'fichas'));
        $this->set('_serialize', ['desparasitacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Desparasitacione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $desparasitacione = $this->Desparasitaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $desparasitacione = $this->Desparasitaciones->patchEntity($desparasitacione, $this->request->data);
            if ($this->Desparasitaciones->save($desparasitacione)) {
                $this->Flash->success(__('The {0} has been saved.', 'Desparasitacione'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Desparasitacione'));
            }
        }
        $fichas = $this->Desparasitaciones->Fichas->find('list', ['limit' => 200]);
        $this->set(compact('desparasitacione', 'fichas'));
        $this->set('_serialize', ['desparasitacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Desparasitacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $desparasitacione = $this->Desparasitaciones->get($id);
        if ($this->Desparasitaciones->delete($desparasitacione)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Desparasitacione'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Desparasitacione'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
