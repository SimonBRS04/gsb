<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fichefraislignefraishorsforfait Controller
 *
 * @property \App\Model\Table\FichefraislignefraishorsforfaitTable $Fichefraislignefraishorsforfait
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FichefraislignefraishorsforfaitController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lignefraishorsforfait', 'Fiche'],
        ];
        $fichefraislignefraishorsforfait = $this->paginate($this->Fichefraislignefraishorsforfait);

        $this->set(compact('fichefraislignefraishorsforfait'));
    }

    /**
     * View method
     *
     * @param string|null $id Fichefraislignefraishorsforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichefraislignefraishorsforfait = $this->Fichefraislignefraishorsforfait->get($id, [
            'contain' => ['Lignefraishorsforfait', 'Fiche'],
        ]);

        $this->set(compact('fichefraislignefraishorsforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fichefraislignefraishorsforfait = $this->Fichefraislignefraishorsforfait->newEmptyEntity();
        if ($this->request->is('post')) {
            $fichefraislignefraishorsforfait = $this->Fichefraislignefraishorsforfait->patchEntity($fichefraislignefraishorsforfait, $this->request->getData());
            if ($this->Fichefraislignefraishorsforfait->save($fichefraislignefraishorsforfait)) {
                $this->Flash->success(__('The fichefraislignefraishorsforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefraislignefraishorsforfait could not be saved. Please, try again.'));
        }
        $lignefraishorsforfait = $this->Fichefraislignefraishorsforfait->Lignefraishorsforfait->find('list', ['limit' => 200])->all();
        $fiche = $this->Fichefraislignefraishorsforfait->Fiche->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefraislignefraishorsforfait', 'lignefraishorsforfait', 'fiche'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fichefraislignefraishorsforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichefraislignefraishorsforfait = $this->Fichefraislignefraishorsforfait->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichefraislignefraishorsforfait = $this->Fichefraislignefraishorsforfait->patchEntity($fichefraislignefraishorsforfait, $this->request->getData());
            if ($this->Fichefraislignefraishorsforfait->save($fichefraislignefraishorsforfait)) {
                $this->Flash->success(__('The fichefraislignefraishorsforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichefraislignefraishorsforfait could not be saved. Please, try again.'));
        }
        $lignefraishorsforfait = $this->Fichefraislignefraishorsforfait->Lignefraishorsforfait->find('list', ['limit' => 200])->all();
        $fiche = $this->Fichefraislignefraishorsforfait->Fiche->find('list', ['limit' => 200])->all();
        $this->set(compact('fichefraislignefraishorsforfait', 'lignefraishorsforfait', 'fiche'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fichefraislignefraishorsforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichefraislignefraishorsforfait = $this->Fichefraislignefraishorsforfait->get($id);
        if ($this->Fichefraislignefraishorsforfait->delete($fichefraislignefraishorsforfait)) {
            $this->Flash->success(__('The fichefraislignefraishorsforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The fichefraislignefraishorsforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
