<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ligneforfait Model
 *
 * @property \App\Model\Table\ForfaitTable&\Cake\ORM\Association\BelongsTo $Forfait
 * @property \App\Model\Table\FichefraisligneTable&\Cake\ORM\Association\HasMany $Fichefraisligne
 *
 * @method \App\Model\Entity\Ligneforfait newEmptyEntity()
 * @method \App\Model\Entity\Ligneforfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ligneforfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ligneforfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ligneforfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ligneforfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ligneforfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ligneforfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ligneforfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ligneforfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ligneforfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ligneforfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ligneforfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LigneforfaitTable extends Table
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

        $this->setTable('ligneforfait');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Forfait', [
            'foreignKey' => 'forfait_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Fichefraisligne', [
            'foreignKey' => 'ligneforfait_id',
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
        $rules->add($rules->existsIn('forfait_id', 'Forfait'), ['errorField' => 'forfait_id']);

        return $rules;
    }
}
