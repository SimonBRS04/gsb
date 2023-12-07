<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenDate;

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
                $this->Flash->success(__('La fiche a été sauvegardée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La fiche n\'a pas pu être sauvegardée. Reesayez plus tard.'));
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
                $this->Flash->success(__('La fiche a été sauvegardée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La fiche n\'a pas pu être sauvegardée. Reesayez plus tard.'));
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
            $this->Flash->success(__('La fiche a été supprimée.'));
        } else {
            $this->Flash->error(__('La fiche n\'a pas pu être supprimée. Reesayez plus tard.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }

    public function myficheslist()
    {
        $this->paginate = [
            'contain' => ['Users', 'Etats'],
        ];
        $fiches = $this->paginate($this->Fiches);
        $identity = $this->getRequest()->getAttribute('identity');
            $identity = $identity ?? [];
            $iduser = $identity["id"];
        $fiches = $this->paginate($this->Fiches->find('all')->where(['user_id' => $iduser]));
        $this->set(compact('fiches'));
    }

    public function myfichesview($id = null)
    {
        $fich = $this->Fiches->get($id, [
            'contain' => ['Lignesforfaits','Lignesforfaits.Forfaits','Lignesfraishorsforfaits','Users','Etats'],
        ]);
        $identity = $this->getRequest()->getAttribute('identity');
            $identity = $identity ?? [];
            $iduser = $identity["id"];
        $this->set(compact('fich'));

        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach($this->request->getData() as $key=>$val){
                if (str_starts_with($key,'l_')){
                    $ligne_id = str_replace('l_', '', $key);
                    $ligne = $this->Fiches->Lignesforfaits->get($ligne_id);
                    $ligne->quantite=$val;
                    $this->Fiches->Lignesforfaits->save($ligne);
                }
            }
        return $this->redirect(['action' => 'myfichesview', $id]);
        }
    }

    public function myfichesadd()
    {
        $fich = $this->Fiches->newEmptyEntity();
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            $fich = $this->Fiches->patchEntity($fich,$data);
            $fich->etat_id = 1;
            $identity = $this->getRequest()->getAttribute('identity');
            $identity = $identity ?? [];
            $fich->user_id = $identity["id"];
            $fich->datemodif = FrozenDate::now();
            $fich->montantvalide = false;

            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('La fiche a été sauvegardée.'));
                // ADD DES FORFAITS
                $forfaits = $this->Fiches->Lignesforfaits->Forfaits->find()->all();
                $lignes =[];
                foreach($forfaits as $forfait){
                    $ligne = $this->Fiches->Lignesforfaits->newEmptyEntity();
                        $ligne->forfait_id = $forfait->id;
                        $ligne->quantite = 0;
                    if($this->Fiches->Lignesforfaits->save($ligne)){
                        $this->Flash->success(__('La ligne '.$forfait->type.' a été sauvegardée.'));
                        array_push($lignes,$ligne);
                    }
                }
                $fich->lignesforfaits=$lignes;
                if ($this->Fiches->save($fich)) {
                    $this->Flash->success(__('Les lignes ont été sauvegardées.'));
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La fiche n\'a pas pu être sauvegardée. Reesayez plus tard.'));
        }
        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $this->set(compact('fich', 'users', 'etats'));
    }

    public function myfichesaddhf($id = null)
    {
        $lfhf = $this->Fiches->Lignesfraishorsforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $lfhf = $this->Fiches->Lignesfraishorsforfaits->patchEntity($lfhf, $this->request->getData());
            if ($this->Fiches->Lignesfraishorsforfaits->save($lfhf)) {
                $this->Flash->success(__('The ligne hors-forfait has been saved.'));

                return $this->redirect(['action' => 'myfichesview', $id]);
            }
            $this->Flash->error(__('The ligne hors-forfait could not be saved. Please, try again.'));
        }
        $fiches = $this->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lfhf', 'id', 'fiches'));
    }
}