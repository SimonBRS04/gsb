<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fiches Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EtatsTable&\Cake\ORM\Association\BelongsTo $Etats
 *
 * @method \App\Model\Entity\Fich newEmptyEntity()
 * @method \App\Model\Entity\Fich newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fich[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fich get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fich findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fich patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fich[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fich|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fich saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FichesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('fiches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'className'=>'CakeDC/Users.Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Etats', [
            'foreignKey' => 'etat_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Lignesforfaits', [
            'foreignKey' => 'fiche_id',
            'targetForeignKey' => 'ligneforfait_id',
            'joinTable' => 'fiches_lignesforfaits',
        ]);
        $this->belongsToMany('Lignesfraishorsforfaits', [
            'foreignKey' => 'fichefrais_id',
            'targetForeignKey' => 'lignesfraishorsforfait_id',
            'joinTable' => 'fiches_lignesfraishorsforfaits',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('etat_id')
            ->notEmptyString('etat_id');

        $validator
            ->scalar('moisannee')
            ->maxLength('moisannee', 6)
            ->requirePresence('moisannee', 'create')
            ->notEmptyString('moisannee');

        $validator
            ->date('datemodif')
            ->requirePresence('datemodif', 'create')
            ->notEmptyDate('datemodif');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('etat_id', 'Etats'), ['errorField' => 'etat_id']);

        return $rules;
    }
}
