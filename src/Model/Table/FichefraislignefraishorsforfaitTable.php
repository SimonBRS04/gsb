<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fichefraislignefraishorsforfait Model
 *
 * @property \App\Model\Table\LignefraishorsforfaitTable&\Cake\ORM\Association\BelongsTo $Lignefraishorsforfait
 * @property \App\Model\Table\FicheTable&\Cake\ORM\Association\BelongsTo $Fiche
 *
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait newEmptyEntity()
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fichefraislignefraishorsforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FichefraislignefraishorsforfaitTable extends Table
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

        $this->setTable('fichefraislignefraishorsforfait');

        $this->belongsTo('Lignefraishorsforfait', [
            'foreignKey' => 'lignefraishf_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Fiche', [
            'foreignKey' => 'fichefrais_id',
            'joinType' => 'INNER',
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
            ->integer('lignefraishf_id')
            ->notEmptyString('lignefraishf_id');

        $validator
            ->integer('fichefrais_id')
            ->notEmptyString('fichefrais_id');

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
        $rules->add($rules->existsIn('lignefraishf_id', 'Lignefraishorsforfait'), ['errorField' => 'lignefraishf_id']);
        $rules->add($rules->existsIn('fichefrais_id', 'Fiche'), ['errorField' => 'fichefrais_id']);

        return $rules;
    }
}
