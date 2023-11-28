<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario newEmptyEntity()
 * @method \App\Model\Entity\Usuario newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Usuario> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Usuario findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Usuario> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsuariosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('usuarios');
        $this->setDisplayField('nombre');
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
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('apellido')
            ->maxLength('apellido', 255)
            ->requirePresence('apellido', 'create')
            ->notEmptyString('apellido');

        $validator
            ->scalar('dni')
            ->maxLength('dni', 20)
            ->requirePresence('dni', 'create')
            ->notEmptyString('dni')
            ->add('dni', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('fecha_nacimiento')
            ->allowEmptyDate('fecha_nacimiento');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 255)
            ->allowEmptyString('foto');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->allowEmptyString('direccion');

        $validator
            ->scalar('codigo_postal')
            ->maxLength('codigo_postal', 10)
            ->allowEmptyString('codigo_postal');

        $validator
            ->scalar('ciudad')
            ->maxLength('ciudad', 255)
            ->allowEmptyString('ciudad');

        $validator
            ->scalar('provincia')
            ->maxLength('provincia', 255)
            ->allowEmptyString('provincia');

        $validator
            ->scalar('pais')
            ->maxLength('pais', 255)
            ->requirePresence('pais', 'create')
            ->notEmptyString('pais');

        $validator
            ->scalar('iban')
            ->maxLength('iban', 255)
            ->requirePresence('iban', 'create')
            ->notEmptyString('iban')
            ->add('iban', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->boolean('es_admin')
            ->allowEmptyString('es_admin');

        $validator
            ->decimal('saldo')
            ->allowEmptyString('saldo');

        $validator
            ->scalar('moneda_preferida')
            ->allowEmptyString('moneda_preferida');

        $validator
            ->scalar('saldo_hexadecimal')
            ->maxLength('saldo_hexadecimal', 255)
            ->allowEmptyString('saldo_hexadecimal');

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
        $rules->add($rules->isUnique(['dni']), ['errorField' => 'dni']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['iban']), ['errorField' => 'iban']);

        return $rules;
    }
}
