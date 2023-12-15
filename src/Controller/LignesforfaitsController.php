<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignesforfaits Controller
 *
 * @property \App\Model\Table\LignesforfaitsTable $Lignesforfaits
 * @method \App\Model\Entity\Lignesforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignesforfaitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('showHeader', true);
        $this->paginate = [
            'contain' => ['Forfaits'],
        ];
        $lignesforfaits = $this->paginate($this->Lignesforfaits);

        $this->set(compact('lignesforfaits'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignesforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('showHeader', true);
        $lignesforfait = $this->Lignesforfaits->get($id, [
            'contain' => ['Forfaits'],
        ]);

        $this->set(compact('lignesforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('showHeader', true);
        $lignesforfait = $this->Lignesforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignesforfait = $this->Lignesforfaits->patchEntity($lignesforfait, $this->request->getData());
            if ($this->Lignesforfaits->save($lignesforfait)) {
                $this->Flash->success(__('The lignesforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignesforfait could not be saved. Please, try again.'));
        }
        $forfaits = $this->Lignesforfaits->Forfaits->find('list', ['limit' => 200])->all();
        $this->set(compact('lignesforfait', 'forfaits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignesforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('showHeader', true);
        $lignesforfait = $this->Lignesforfaits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignesforfait = $this->Lignesforfaits->patchEntity($lignesforfait, $this->request->getData());
            if ($this->Lignesforfaits->save($lignesforfait)) {
                $this->Flash->success(__('The lignesforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignesforfait could not be saved. Please, try again.'));
        }
        $forfaits = $this->Lignesforfaits->Forfaits->find('list', ['limit' => 200])->all();
        $this->set(compact('lignesforfait', 'forfaits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignesforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->set('showHeader', true);
        $this->request->allowMethod(['post', 'delete']);
        $lignesforfait = $this->Lignesforfaits->get($id);
        if ($this->Lignesforfaits->delete($lignesforfait)) {
            $this->Flash->success(__('The lignesforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The lignesforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
