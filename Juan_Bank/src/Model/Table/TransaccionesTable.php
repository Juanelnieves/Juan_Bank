<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transacciones Model
 *
 * @method \App\Model\Entity\Transaccione newEmptyEntity()
 * @method \App\Model\Entity\Transaccione newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaccione> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaccione get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Transaccione findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Transaccione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaccione> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaccione|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Transaccione saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Transaccione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaccione>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaccione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaccione> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaccione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaccione>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaccione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaccione> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TransaccionesTable extends Table
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

        $this->setTable('transacciones');
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
            ->integer('id_usuario')
            ->allowEmptyString('id_usuario');

        $validator
            ->decimal('cantidad')
            ->allowEmptyString('cantidad');

        $validator
            ->scalar('tipo')
            ->allowEmptyString('tipo');

        $validator
            ->dateTime('fecha_hora')
            ->allowEmptyDateTime('fecha_hora');

        return $validator;
    }
}
