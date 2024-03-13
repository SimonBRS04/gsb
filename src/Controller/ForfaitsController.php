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
        $this->set('showHeader', true);
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
        $this->set('showHeader', true);
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
        $this->set('showHeader', true);
        $forfait = $this->Forfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $forfait = $this->Forfaits->patchEntity($forfait, $this->request->getData());
            if ($this->Forfaits->save($forfait)) {
                $this->Flash->success(__('Le forfait à été sauvegardé.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Le forfait n\'a pas pu être sauvegardé, réessayez.'));
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
        $this->set('showHeader', true);
        $forfait = $this->Forfaits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forfait = $this->Forfaits->patchEntity($forfait, $this->request->getData());
            if ($this->Forfaits->save($forfait)) {
                $this->Flash->success(__('Le forfait à été sauvegardé.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Le forfait n\'a pas pu être sauvegardé, réessayez.'));
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
        $this->set('showHeader', true);
        $this->request->allowMethod(['post', 'delete']);
        $forfait = $this->Forfaits->get($id);
        if ($this->Forfaits->delete($forfait)) {
            $this->Flash->success(__('Le forfait à été supprimé.'));
        } else {
            $this->Flash->error(__('Le forfait n\'a pas pu être supprimé, réessayez.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
