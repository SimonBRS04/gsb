<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignefraishorsforfait Model
 *
 * @method \App\Model\Entity\Lignefraishorsforfait newEmptyEntity()
 * @method \App\Model\Entity\Lignefraishorsforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LignefraishorsforfaitTable extends Table
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

        $this->setTable('lignefraishorsforfait');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
