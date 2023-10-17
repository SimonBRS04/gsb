<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ligneforfait Controller
 *
 * @property \App\Model\Table\LigneforfaitTable $Ligneforfait
 * @method \App\Model\Entity\Ligneforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LigneforfaitController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Forfait'],
        ];
        $ligneforfait = $this->paginate($this->Ligneforfait);

        $this->set(compact('ligneforfait'));
    }

    /**
     * View method
     *
     * @param string|null $id Ligneforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ligneforfait = $this->Ligneforfait->get($id, [
            'contain' => ['Forfait', 'Fichefraisligne'],
        ]);

        $this->set(compact('ligneforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ligneforfait = $this->Ligneforfait->newEmptyEntity();
        if ($this->request->is('post')) {
            $ligneforfait = $this->Ligneforfait->patchEntity($ligneforfait, $this->request->getData());
            if ($this->Ligneforfait->save($ligneforfait)) {
                $this->Flash->success(__('The ligneforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ligneforfait could not be saved. Please, try again.'));
        }
        $forfait = $this->Ligneforfait->Forfait->find('list', ['limit' => 200])->all();
        $this->set(compact('ligneforfait', 'forfait'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ligneforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ligneforfait = $this->Ligneforfait->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ligneforfait = $this->Ligneforfait->patchEntity($ligneforfait, $this->request->getData());
            if ($this->Ligneforfait->save($ligneforfait)) {
                $this->Flash->success(__('The ligneforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ligneforfait could not be saved. Please, try again.'));
        }
        $forfait = $this->Ligneforfait->Forfait->find('list', ['limit' => 200])->all();
        $this->set(compact('ligneforfait', 'forfait'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ligneforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ligneforfait = $this->Ligneforfait->get($id);
        if ($this->Ligneforfait->delete($ligneforfait)) {
            $this->Flash->success(__('The ligneforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The ligneforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
