<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mensajes Model
 *
 * @method \App\Model\Entity\Mensaje newEmptyEntity()
 * @method \App\Model\Entity\Mensaje newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Mensaje> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mensaje get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Mensaje findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Mensaje patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Mensaje> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mensaje|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Mensaje saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Mensaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mensaje>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mensaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mensaje> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mensaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mensaje>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mensaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mensaje> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MensajesTable extends Table
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

        $this->setTable('mensajes');
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
            ->integer('remitente')
            ->allowEmptyString('remitente');

        $validator
            ->integer('destinatario')
            ->allowEmptyString('destinatario');

        $validator
            ->scalar('mensaje')
            ->allowEmptyString('mensaje');

        $validator
            ->dateTime('fecha_hora')
            ->allowEmptyDateTime('fecha_hora');

        return $validator;
    }
}
