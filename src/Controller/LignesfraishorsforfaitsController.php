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
        $this->set('showHeader', true);
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
        $this->set('showHeader', true);
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->get($id, [
            'contain' => ['Fiches'],
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
        $this->set('showHeader', true);
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->patchEntity($lignesfraishorsforfait, $this->request->getData());
            if ($this->Lignesfraishorsforfaits->save($lignesfraishorsforfait)) {
                $this->Flash->success(__('La lignefraishorsforfait a été sauvegardée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La lignefraishorsforfait n\'a pas pu être sauvegardée, réessayez.'));
        }
        $fiches = $this->Lignesfraishorsforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignesfraishorsforfait', 'fiches'));
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
        $this->set('showHeader', true);
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->get($id, [
            'contain' => ['Fiches'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->patchEntity($lignesfraishorsforfait, $this->request->getData());
            if ($this->Lignesfraishorsforfaits->save($lignesfraishorsforfait)) {
                $this->Flash->success(__('La lignefraishorsforfait a été sauvegardée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La lignefraishorsforfait n\'a pas pu être sauvegardée, réessayez.'));
        }
        $fiches = $this->Lignesfraishorsforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignesfraishorsforfait', 'fiches'));
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
        $this->set('showHeader', true);
        $this->request->allowMethod(['post', 'delete']);
        $lignesfraishorsforfait = $this->Lignesfraishorsforfaits->get($id);
        if ($this->Lignesfraishorsforfaits->delete($lignesfraishorsforfait)) {
                $this->Flash->success(__('La lignefraishorsforfait a été supprimée.'));
        } else {
            $this->Flash->error(__('La lignefraishorsforfait n\'a pas pu être supprimée, réessayez.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
