<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignesfraishorsforfaits Model
 *
 * @property \App\Model\Table\FichesTable&\Cake\ORM\Association\BelongsToMany $Fiches
 *
 * @method \App\Model\Entity\Lignesfraishorsforfait newEmptyEntity()
 * @method \App\Model\Entity\Lignesfraishorsforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignesfraishorsforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LignesfraishorsforfaitsTable extends Table
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

        $this->setTable('lignesfraishorsforfaits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Fiches', [
            'foreignKey' => 'lignesfraishorsforfait_id',
            'targetForeignKey' => 'fichefrais_id',
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->numeric('montant')
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        $validator
            ->scalar('libelle')
            ->maxLength('libelle', 100)
            ->requirePresence('libelle', 'create')
            ->notEmptyString('libelle');

        return $validator;
    }
}
