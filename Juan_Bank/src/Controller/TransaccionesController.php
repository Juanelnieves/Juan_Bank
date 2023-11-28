<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transacciones Controller
 *
 * @property \App\Model\Table\TransaccionesTable $Transacciones
 */
class TransaccionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Transacciones->find();
        $transacciones = $this->paginate($query);

        $this->set(compact('transacciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaccione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaccione = $this->Transacciones->get($id, contain: []);
        $this->set(compact('transaccione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaccione = $this->Transacciones->newEmptyEntity();
        if ($this->request->is('post')) {
            $transaccione = $this->Transacciones->patchEntity($transaccione, $this->request->getData());
            if ($this->Transacciones->save($transaccione)) {
                $this->Flash->success(__('The transaccione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaccione could not be saved. Please, try again.'));
        }
        $this->set(compact('transaccione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaccione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaccione = $this->Transacciones->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaccione = $this->Transacciones->patchEntity($transaccione, $this->request->getData());
            if ($this->Transacciones->save($transaccione)) {
                $this->Flash->success(__('The transaccione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaccione could not be saved. Please, try again.'));
        }
        $this->set(compact('transaccione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaccione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaccione = $this->Transacciones->get($id);
        if ($this->Transacciones->delete($transaccione)) {
            $this->Flash->success(__('The transaccione has been deleted.'));
        } else {
            $this->Flash->error(__('The transaccione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
