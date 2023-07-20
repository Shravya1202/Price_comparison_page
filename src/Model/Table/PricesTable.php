<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prices Model
 *
 * @property \App\Model\Table\ShoesTable&\Cake\ORM\Association\BelongsTo $Shoes
 * @property \App\Model\Table\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \App\Model\Entity\Price newEmptyEntity()
 * @method \App\Model\Entity\Price newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Price[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Price get($primaryKey, $options = [])
 * @method \App\Model\Entity\Price findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Price patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Price[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Price|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Price saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Price[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Price[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Price[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Price[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PricesTable extends Table
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

        $this->setTable('prices');
        $this->setDisplayField('price_id');
        $this->setPrimaryKey('price_id');

        $this->belongsTo('Shoes', [
            'foreignKey' => 'shoes_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
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
            ->integer('shoes_id')
            ->notEmptyString('shoes_id');

        $validator
            ->integer('store_id')
            ->notEmptyString('store_id');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

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
        $rules->add($rules->existsIn('shoes_id', 'Shoes'), ['errorField' => 'shoes_id']);
        $rules->add($rules->existsIn('store_id', 'Stores'), ['errorField' => 'store_id']);

        return $rules;
    }
}