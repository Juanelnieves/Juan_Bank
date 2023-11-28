<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Prestamos Controller
 *
 * @property \App\Model\Table\PrestamosTable $Prestamos
 */
class PrestamosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Prestamos->find();
        $prestamos = $this->paginate($query);

        $this->set(compact('prestamos'));
    }

    /**
     * View method
     *
     * @param string|null $id Prestamo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prestamo = $this->Prestamos->get($id, contain: []);
        $this->set(compact('prestamo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prestamo = $this->Prestamos->newEmptyEntity();
        if ($this->request->is('post')) {
            $prestamo = $this->Prestamos->patchEntity($prestamo, $this->request->getData());
            if ($this->Prestamos->save($prestamo)) {
                $this->Flash->success(__('The prestamo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prestamo could not be saved. Please, try again.'));
        }
        $this->set(compact('prestamo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prestamo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prestamo = $this->Prestamos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prestamo = $this->Prestamos->patchEntity($prestamo, $this->request->getData());
            if ($this->Prestamos->save($prestamo)) {
                $this->Flash->success(__('The prestamo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prestamo could not be saved. Please, try again.'));
        }
        $this->set(compact('prestamo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prestamo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prestamo = $this->Prestamos->get($id);
        if ($this->Prestamos->delete($prestamo)) {
            $this->Flash->success(__('The prestamo has been deleted.'));
        } else {
            $this->Flash->error(__('The prestamo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
