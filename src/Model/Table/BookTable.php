<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Book Model
 *
 * @property \App\Model\Table\AuthorTable&\Cake\ORM\Association\BelongsTo $Author
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsToMany $User
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 */
class BookTable extends Table
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

        $this->setTable('book');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Author', [
            'foreignKey' => 'author_id',
        ]);
        $this->belongsToMany('User', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'user_book',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 255)
            ->requirePresence('isbn', 'create')
            ->notEmptyString('isbn');

        $validator
            ->scalar('editorial')
            ->maxLength('editorial', 255)
            ->requirePresence('editorial', 'create')
            ->notEmptyString('editorial');

        $validator
            ->scalar('publish_year')
            ->maxLength('publish_year', 255)
            ->requirePresence('publish_year', 'create')
            ->notEmptyString('publish_year');

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
        $rules->add($rules->existsIn(['author_id'], 'Author'));

        return $rules;
    }
}
