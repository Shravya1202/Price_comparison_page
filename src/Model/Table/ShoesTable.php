<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shoes Model
 *
 * @method \App\Model\Entity\Shoe newEmptyEntity()
 * @method \App\Model\Entity\Shoe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Shoe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shoe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shoe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Shoe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shoe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shoe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shoe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shoe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shoe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shoe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shoe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShoesTable extends Table
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

        $this->setTable('shoes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('shoes_id');
        $this->hasMany('Prices', [
            'foreignKey' => 'shoes_id', // Specify the foreign key column for Shoes->Prices relationship
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('image_url')
            ->maxLength('image_url', 255)
            ->allowEmptyFile('image_url');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        return $validator;
    }
}