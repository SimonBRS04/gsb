<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignesfraishorsforfaits Controller
 *
 * @property \App\Model\Table\LignesfraishorsforfaitsTable $Lignesfraishorsforfaits
 * @method \App\Model\Entity\Lignesfraishorsforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignesfraishorsforfaitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $lignesfraishorsforfaits = $this->paginate($this->Lignesfraishorsforfaits);

        $this->set(compact('lignesfraishorsforfaits'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignesfraishorsforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('lignesfraishorsforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->patchEntity($lignesfraishorsforfait, $this->request->getData());
            if ($this->Lignesfraishorsforfaits->save($lignesfraishorsforfait)) {
                $this->Flash->success(__('The lignesfraishorsforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignesfraishorsforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('lignesfraishorsforfait'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignesfraishorsforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->patchEntity($lignesfraishorsforfait, $this->request->getData());
            if ($this->Lignesfraishorsforfaits->save($lignesfraishorsforfait)) {
                $this->Flash->success(__('The lignesfraishorsforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignesfraishorsforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('lignesfraishorsforfait'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignesfraishorsforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->get($id);
        if ($this->Lignesfraishorsforfaits->delete($lignesfraishorsforfait)) {
            $this->Flash->success(__('The lignesfraishorsforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The lignesfraishorsforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
