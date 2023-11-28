<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transaccione> $transacciones
 */
?>
<div class="transacciones index content">
    <?= $this->Html->link(__('New Transaccione'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transacciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_usuario') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('fecha_hora') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transacciones as $transaccione): ?>
                <tr>
                    <td><?= $this->Number->format($transaccione->id) ?></td>
                    <td><?= $transaccione->id_usuario === null ? '' : $this->Number->format($transaccione->id_usuario) ?></td>
                    <td><?= $transaccione->cantidad === null ? '' : $this->Number->format($transaccione->cantidad) ?></td>
                    <td><?= h($transaccione->tipo) ?></td>
                    <td><?= h($transaccione->fecha_hora) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transaccione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaccione->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaccione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaccione->id)]) ?>
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
