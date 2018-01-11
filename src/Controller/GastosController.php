<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Gastos Controller
 *
 * @property \App\Model\Table\GastosTable $Gastos
 *
 * @method \App\Model\Entity\Gasto[] paginate($object = null, array $settings = [])
 */
class GastosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $gastos = $this->paginate($this->Gastos);

        $this->set(compact('gastos'));
        $this->set('_serialize', ['gastos']);
    }

    /**
     * View method
     *
     * @param string|null $id Gasto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gasto = $this->Gastos->get($id, [
            'contain' => []
        ]);

        $this->set('gasto', $gasto);
        $this->set('_serialize', ['gasto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gasto = $this->Gastos->newEntity();
        if ($this->request->is('post')) {
            $gasto = $this->Gastos->patchEntity($gasto, $this->request->getData());
            $gasto->fecha = new Time($this->request->data['fecha']);
            if ($this->Gastos->save($gasto)) {
                $this->Flash->success(__('The gasto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gasto could not be saved. Please, try again.'));
        }
        $this->set(compact('gasto'));
        $this->set('_serialize', ['gasto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gasto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gasto = $this->Gastos->get($id, [
            'contain' => []
        ]);
        $gasto->fecha = $gasto->fecha->i18nFormat('dd-MM-yyyy');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gasto = $this->Gastos->patchEntity($gasto, $this->request->getData());
            $gasto->fecha = new Time($this->request->data['fecha']);
            if ($this->Gastos->save($gasto)) {
                $this->Flash->success(__('The gasto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gasto could not be saved. Please, try again.'));
        }
        $this->set(compact('gasto'));
        $this->set('_serialize', ['gasto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gasto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gasto = $this->Gastos->get($id);
        if ($this->Gastos->delete($gasto)) {
            $this->Flash->success(__('The gasto has been deleted.'));
        } else {
            $this->Flash->error(__('The gasto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
