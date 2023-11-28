<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<div class="usuarios index content">
    <?= $this->Html->link(__('New Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellido') ?></th>
                    <th><?= $this->Paginator->sort('dni') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('foto') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('codigo_postal') ?></th>
                    <th><?= $this->Paginator->sort('ciudad') ?></th>
                    <th><?= $this->Paginator->sort('provincia') ?></th>
                    <th><?= $this->Paginator->sort('pais') ?></th>
                    <th><?= $this->Paginator->sort('iban') ?></th>
                    <th><?= $this->Paginator->sort('es_admin') ?></th>
                    <th><?= $this->Paginator->sort('saldo') ?></th>
                    <th><?= $this->Paginator->sort('moneda_preferida') ?></th>
                    <th><?= $this->Paginator->sort('saldo_hexadecimal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $this->Number->format($usuario->id) ?></td>
                    <td><?= h($usuario->nombre) ?></td>
                    <td><?= h($usuario->apellido) ?></td>
                    <td><?= h($usuario->dni) ?></td>
                    <td><?= h($usuario->email) ?></td>
                    <td><?= h($usuario->fecha_nacimiento) ?></td>
                    <td><?= h($usuario->foto) ?></td>
                    <td><?= h($usuario->direccion) ?></td>
                    <td><?= h($usuario->codigo_postal) ?></td>
                    <td><?= h($usuario->ciudad) ?></td>
                    <td><?= h($usuario->provincia) ?></td>
                    <td><?= h($usuario->pais) ?></td>
                    <td><?= h($usuario->iban) ?></td>
                    <td><?= h($usuario->es_admin) ?></td>
                    <td><?= $usuario->saldo === null ? '' : $this->Number->format($usuario->saldo) ?></td>
                    <td><?= h($usuario->moneda_preferida) ?></td>
                    <td><?= h($usuario->saldo_hexadecimal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
