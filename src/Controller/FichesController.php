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
        $this->set('showHeader', true);
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
        $this->set('showHeader', true);
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
        $this->set('showHeader', true);
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
        $this->set('showHeader', true);
        $fich = $this->Fiches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->getData());
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('La fiche a été sauvegardée.'));

                return $this->redirect(['action' => 'myficheslist']);
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
        $this->set('showHeader', true);
        $this->request->allowMethod(['post', 'delete']);
        $fich = $this->Fiches->get($id);
        if ($this->Fiches->delete($fich)) {
            $this->Flash->success(__('La fiche a été supprimée.'));
        } else {
            $this->Flash->error(__('La fiche n\'a pas pu être supprimée. Reesayez plus tard.'));
        }
        
        return $this->redirect(['action' => 'myficheslist']);
    }

    public function myficheslist()
    {
        $this->set('showHeader', true);
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

    public function myfichesedit($id = null)
    {
        $this->set('showHeader', true);
        $fich = $this->Fiches->get($id, [
            'contain' => ['Lignesforfaits','Lignesforfaits.Forfaits','Lignesfraishorsforfaits','Users','Etats'],
        ]);
        $identity = $this->getRequest()->getAttribute('identity');
            $identity = $identity ?? [];
            $iduser = $identity["id"];
        $this->set(compact('fich', 'id'));
        if ($fich->etat_id == 1){
            if ($this->request->is(['patch', 'post', 'put'])) {
                foreach($this->request->getData() as $key=>$val){
                    if (str_starts_with($key,'l_')){
                        $ligne_id = str_replace('l_', '', $key);
                        $ligne = $this->Fiches->Lignesforfaits->get($ligne_id);
                        $ligne->quantite=$val;
                        $this->Fiches->Lignesforfaits->save($ligne);
                    }
                }
                $fich->datemodif = FrozenDate::now();
                $this->Fiches->save($fich);
                if ($this->Fiches->save($fich)) {
                    $this->Flash->success(__('La fiche a été sauvegardée.'));
                }
            return $this->redirect(['action' => 'myfichesedit', $id]);
            }
        }
        else {
            $this->Flash->error('Vous ne pouvez plus modifier cette fiche.');
            return $this->redirect(['action' => 'myfichesview', $id]);
        }
    }

    public function myfichesadd()
    {
        $this->set('showHeader', true);
        $fich = $this->Fiches->newEmptyEntity();
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            $fich = $this->Fiches->patchEntity($fich,$data); 

            $fich->etat_id = 1;
            $identity = $this->getRequest()->getAttribute('identity');
            $identity = $identity ?? [];
            $fich->user_id = $identity["id"];
            $fich->datemodif = FrozenDate::now();

            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('La fiche du '.$fich->moisannee.' a été créée.'));
                // ADD DES FORFAITS
                $forfaits = $this->Fiches->Lignesforfaits->Forfaits->find()->all();
                $lignes =[];
                foreach($forfaits as $forfait){
                    $ligne = $this->Fiches->Lignesforfaits->newEmptyEntity();
                        $ligne->forfait_id = $forfait->id;
                        $ligne->quantite = 0;
                    if($this->Fiches->Lignesforfaits->save($ligne)){
                        array_push($lignes,$ligne);
                    }
                }
                $fich->lignesforfaits=$lignes;
                $this->Fiches->save($fich);
                
                return $this->redirect(['action' => 'myfichesedit',$fich->id]);
            }
            $this->Flash->error(__('La fiche n\'a pas pu être sauvegardée. Reesayez plus tard.'));
        }
        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $this->set(compact('fich', 'users', 'etats'));
    }

    public function myfichesaddhf($id = null)
    {
        $this->set('showHeader', true);
        $lfhf = $this->Fiches->Lignesfraishorsforfaits->newEmptyEntity();
        // $lfhf->fiches._ids = $id;
        if ($this->request->is('post')) {
            $lfhf = $this->Fiches->Lignesfraishorsforfaits->patchEntity($lfhf, $this->request->getData());
            if ($this->Fiches->Lignesfraishorsforfaits->save($lfhf)) {
                $this->Flash->success(__('La ligne hors-forfait à été sauvegardée.'));
                

                return $this->redirect(['action' => 'myfichesedit', $id]);
            }
            $this->Flash->error(__('La ligne hors-forfait n\'a pas pu être sauvegardée, réessayez.'));
        }
        $fiches = $this->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lfhf','id', 'fiches'));
    }

    public function deletehf($id = null, $idhf = null)
    {
        $this->set('showHeader', true);
        $this->request->allowMethod(['post', 'delete']);
        $lignesfraishorsforfait = $this->Fiches->Lignesfraishorsforfaits->get($idhf);
        if ($this->Fiches->Lignesfraishorsforfaits->delete($lignesfraishorsforfait)) {
            $this->Flash->success(__('La ligne hors-forfait à été supprimée.'));
        } else {
            $this->Flash->error(__('La ligne hors-forfait n\'a pas pu être supprimée, réessayez.'));
        }

        return $this->redirect(['action' => 'myfichesedit', $id]);
    }

    public function edithf($id = null, $idhf = null)
    {
        $this->set('showHeader', true);
        $lignesfraishorsforfait = $this->Fiches->Lignesfraishorsforfaits->get($idhf, [
            'contain' => ['Fiches'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignesfraishorsforfait = $this->Fiches->Lignesfraishorsforfaits->patchEntity($lignesfraishorsforfait, $this->request->getData());
            if ($this->Fiches->Lignesfraishorsforfaits->save($lignesfraishorsforfait)) {
                $this->Flash->success(__('La ligne hors-forfait à été sauvegardée.'));

                return $this->redirect(['action' => 'myfichesedit', $id]);
            }
            $this->Flash->error(__('La ligne hors-forfait n\'a pas pu être sauvegardée, réessayez.'));
        }
        $fiches = $this->Fiches->Lignesfraishorsforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignesfraishorsforfait', 'fiches', 'id'));
    }

    public function ficheslist()
    {
        $this->set('showHeader', true);
        $this->paginate = [
            'contain' => ['Users', 'Etats'],
        ];
        $fichelist=$this->Fiches->find('all')->order("moisannee");
        $fiches = $this->paginate($fichelist);

        $this->set(compact('fiches'));
    }
    
    public function myfichesview($id = null)
    {
        $this->set('showHeader', true);
        $fich = $this->Fiches->get($id, [
            'contain' => ['Lignesforfaits','Lignesforfaits.Forfaits','Lignesfraishorsforfaits','Users','Etats'],
        ]);
        $identity = $this->getRequest()->getAttribute('identity');
            $identity = $identity ?? [];
            $iduser = $identity["id"];
        $this->set(compact('fich', 'id'));

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
    
    public function modifetats($id_fich = null, $id_etat = null){
        $this->set('showHeader', true);
        $fich = $this->Fiches->get($id_fich, [
            'contain' => ['Lignesforfaits','Lignesforfaits.Forfaits','Lignesfraishorsforfaits','Users','Etats'],
        ]);
        $fich->etat_id = $id_etat;
        $this->Fiches->save($fich);
        if ($this->Fiches->save($fich)) {
            $this->Flash->success(__('La fiche a été sauvegardée.'));
        }
        return $this->redirect(['action' => 'myfichesview', $id_fich]);
    }

}