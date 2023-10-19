<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignesforfaits Model
 *
 * @property \App\Model\Table\ForfaitsTable&\Cake\ORM\Association\BelongsTo $Forfaits
 *
 * @method \App\Model\Entity\Lignesforfait newEmptyEntity()
 * @method \App\Model\Entity\Lignesforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lignesforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lignesforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lignesforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lignesforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lignesforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lignesforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignesforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lignesforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignesforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignesforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lignesforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LignesforfaitsTable extends Table
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

        $this->setTable('lignesforfaits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Forfaits', [
            'foreignKey' => 'forfait_id',
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
            ->integer('forfait_id')
            ->notEmptyString('forfait_id');

        $validator
            ->integer('quantite')
            ->requirePresence('quantite', 'create')
            ->notEmptyString('quantite');

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
        $rules->add($rules->existsIn('forfait_id', 'Forfaits'), ['errorField' => 'forfait_id']);

        return $rules;
    }
}
