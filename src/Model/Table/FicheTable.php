<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fiche Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EtatTable&\Cake\ORM\Association\BelongsTo $Etat
 * @property \App\Model\Table\FichefraisligneTable&\Cake\ORM\Association\HasMany $Fichefraisligne
 *
 * @method \App\Model\Entity\Fiche newEmptyEntity()
 * @method \App\Model\Entity\Fiche newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fiche[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fiche get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fiche findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fiche patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fiche[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fiche|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fiche saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fiche[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fiche[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fiche[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fiche[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FicheTable extends Table
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

        $this->setTable('fiche');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Etat', [
            'foreignKey' => 'etat_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Fichefraisligne', [
            'foreignKey' => 'fiche_id',
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
            ->maxLength('moisannee', 20)
            ->requirePresence('moisannee', 'create')
            ->notEmptyString('moisannee');

        $validator
            ->integer('nbjustificatifs')
            ->requirePresence('nbjustificatifs', 'create')
            ->notEmptyString('nbjustificatifs');

        $validator
            ->boolean('montantvalide')
            ->requirePresence('montantvalide', 'create')
            ->notEmptyString('montantvalide');

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
        $rules->add($rules->existsIn('etat_id', 'Etat'), ['errorField' => 'etat_id']);

        return $rules;
    }
}
