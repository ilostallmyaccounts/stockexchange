<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Behavior\TranslateBehavior;

/**
 * Groupes Model
 *
 * @property \App\Model\Table\FilesTable&\Cake\ORM\Association\BelongsTo $Files
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Groupe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Groupe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Groupe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Groupe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Groupe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Groupe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Groupe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Groupe findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GroupesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
		
        $this->setTable('groupes');
        $this->setDisplayField('groupname');
        $this->setPrimaryKey('id');
		
        $this->addBehavior('Timestamp');
		
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'groupe_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_groupes'
        ]);
		
		$this->addBehavior('Translate', ['fields' => ['groupname']]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('groupname')
            ->maxLength('groupname', 32)
            ->requirePresence('groupname', 'create')
            ->notEmptyString('groupname');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
