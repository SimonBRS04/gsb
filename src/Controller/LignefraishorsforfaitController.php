<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignefraishorsforfait Controller
 *
 * @property \App\Model\Table\LignefraishorsforfaitTable $Lignefraishorsforfait
 * @method \App\Model\Entity\Lignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignefraishorsforfaitController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $lignefraishorsforfait = $this->paginate($this->Lignefraishorsforfait);

        $this->set(compact('lignefraishorsforfait'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignefraishorsforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lignefraishorsforfait = $this->Lignefraishorsforfait->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('lignefraishorsforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignefraishorsforfait = $this->Lignefraishorsforfait->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraishorsforfait = $this->Lignefraishorsforfait->patchEntity($lignefraishorsforfait, $this->request->getData());
            if ($this->Lignefraishorsforfait->save($lignefraishorsforfait)) {
                $this->Flash->success(__('The lignefraishorsforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignefraishorsforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('lignefraishorsforfait'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignefraishorsforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lignefraishorsforfait = $this->Lignefraishorsforfait->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignefraishorsforfait = $this->Lignefraishorsforfait->patchEntity($lignefraishorsforfait, $this->request->getData());
            if ($this->Lignefraishorsforfait->save($lignefraishorsforfait)) {
                $this->Flash->success(__('The lignefraishorsforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignefraishorsforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('lignefraishorsforfait'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignefraishorsforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lignefraishorsforfait = $this->Lignefraishorsforfait->get($id);
        if ($this->Lignefraishorsforfait->delete($lignefraishorsforfait)) {
            $this->Flash->success(__('The lignefraishorsforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The lignefraishorsforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
