<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fiche Controller
 *
 * @property \App\Model\Table\FicheTable $Fiche
 * @method \App\Model\Entity\Fiche[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FicheController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Etat'],
        ];
        $fiche = $this->paginate($this->Fiche);

        $this->set(compact('fiche'));
    }

    /**
     * View method
     *
     * @param string|null $id Fiche id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fiche = $this->Fiche->get($id, [
            'contain' => ['Users', 'Etat', 'Fichefraisligne'],
        ]);

        $this->set(compact('fiche'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fiche = $this->Fiche->newEmptyEntity();
        if ($this->request->is('post')) {
            $fiche = $this->Fiche->patchEntity($fiche, $this->request->getData());
            if ($this->Fiche->save($fiche)) {
                $this->Flash->success(__('The fiche has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fiche could not be saved. Please, try again.'));
        }
        $users = $this->Fiche->Users->find('list', ['limit' => 200])->all();
        $etat = $this->Fiche->Etat->find('list', ['limit' => 200])->all();
        $this->set(compact('fiche', 'users', 'etat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fiche id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fiche = $this->Fiche->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fiche = $this->Fiche->patchEntity($fiche, $this->request->getData());
            if ($this->Fiche->save($fiche)) {
                $this->Flash->success(__('The fiche has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fiche could not be saved. Please, try again.'));
        }
        $users = $this->Fiche->Users->find('list', ['limit' => 200])->all();
        $etat = $this->Fiche->Etat->find('list', ['limit' => 200])->all();
        $this->set(compact('fiche', 'users', 'etat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fiche id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fiche = $this->Fiche->get($id);
        if ($this->Fiche->delete($fiche)) {
            $this->Flash->success(__('The fiche has been deleted.'));
        } else {
            $this->Flash->error(__('The fiche could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
