<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Mensajes Controller
 *
 * @property \App\Model\Table\MensajesTable $Mensajes
 */
class MensajesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Mensajes->find();
        $mensajes = $this->paginate($query);

        $this->set(compact('mensajes'));
    }

    /**
     * View method
     *
     * @param string|null $id Mensaje id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mensaje = $this->Mensajes->get($id, contain: []);
        $this->set(compact('mensaje'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mensaje = $this->Mensajes->newEmptyEntity();
        if ($this->request->is('post')) {
            $mensaje = $this->Mensajes->patchEntity($mensaje, $this->request->getData());
            if ($this->Mensajes->save($mensaje)) {
                $this->Flash->success(__('The mensaje has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mensaje could not be saved. Please, try again.'));
        }
        $this->set(compact('mensaje'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mensaje id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mensaje = $this->Mensajes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mensaje = $this->Mensajes->patchEntity($mensaje, $this->request->getData());
            if ($this->Mensajes->save($mensaje)) {
                $this->Flash->success(__('The mensaje has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mensaje could not be saved. Please, try again.'));
        }
        $this->set(compact('mensaje'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mensaje id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mensaje = $this->Mensajes->get($id);
        if ($this->Mensajes->delete($mensaje)) {
            $this->Flash->success(__('The mensaje has been deleted.'));
        } else {
            $this->Flash->error(__('The mensaje could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
