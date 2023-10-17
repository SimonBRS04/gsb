<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fiches Controller
 *
 * @property \App\Model\Table\FichesTable $Fiches
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FichesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Etats'],
        ];
        $fiches = $this->paginate($this->Fiches);

        $this->set(compact('fiches'));
    }

    /**
     * View method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fich = $this->Fiches->get($id, [
            'contain' => ['Users', 'Etats'],
        ]);

        $this->set(compact('fich'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fich = $this->Fiches->newEmptyEntity();
        if ($this->request->is('post')) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->getData());
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('The fich has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fich could not be saved. Please, try again.'));
        }
        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $this->set(compact('fich', 'users', 'etats'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fich = $this->Fiches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->getData());
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('The fich has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fich could not be saved. Please, try again.'));
        }
        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $this->set(compact('fich', 'users', 'etats'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fich = $this->Fiches->get($id);
        if ($this->Fiches->delete($fich)) {
            $this->Flash->success(__('The fich has been deleted.'));
        } else {
            $this->Flash->error(__('The fich could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
