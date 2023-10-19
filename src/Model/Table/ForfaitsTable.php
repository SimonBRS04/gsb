<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forfaits Model
 *
 * @property \App\Model\Table\LignesforfaitsTable&\Cake\ORM\Association\HasMany $Lignesforfaits
 *
 * @method \App\Model\Entity\Forfait newEmptyEntity()
 * @method \App\Model\Entity\Forfait newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Forfait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forfait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Forfait findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Forfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Forfait[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forfait|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forfait saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forfait[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forfait[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forfait[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forfait[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ForfaitsTable extends Table
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

        $this->setTable('forfaits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Lignesforfaits', [
            'foreignKey' => 'forfait_id',
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
            ->scalar('type')
            ->maxLength('type', 50)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->numeric('prix')
            ->requirePresence('prix', 'create')
            ->notEmptyString('prix');

        return $validator;
    }
}
