<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Forfaits Controller
 *
 * @property \App\Model\Table\ForfaitsTable $Forfaits
 * @method \App\Model\Entity\Forfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForfaitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $forfaits = $this->paginate($this->Forfaits);

        $this->set(compact('forfaits'));
    }

    /**
     * View method
     *
     * @param string|null $id Forfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forfait = $this->Forfaits->get($id, [
            'contain' => ['Lignesforfaits'],
        ]);

        $this->set(compact('forfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forfait = $this->Forfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $forfait = $this->Forfaits->patchEntity($forfait, $this->request->getData());
            if ($this->Forfaits->save($forfait)) {
                $this->Flash->success(__('The forfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forfait could not be saved. Please, try again.'));
        }
        $this->set(compact('forfait'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forfait = $this->Forfaits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forfait = $this->Forfaits->patchEntity($forfait, $this->request->getData());
            if ($this->Forfaits->save($forfait)) {
                $this->Flash->success(__('The forfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forfait could not be saved. Please, try again.'));
        }
        $this->set(compact('forfait'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Forfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forfait = $this->Forfaits->get($id);
        if ($this->Forfaits->delete($forfait)) {
            $this->Flash->success(__('The forfait has been deleted.'));
        } else {
            $this->Flash->error(__('The forfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
