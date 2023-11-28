<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Mensaje> $mensajes
 */
?>
<div class="mensajes index content">
    <?= $this->Html->link(__('New Mensaje'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mensajes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('remitente') ?></th>
                    <th><?= $this->Paginator->sort('destinatario') ?></th>
                    <th><?= $this->Paginator->sort('fecha_hora') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensajes as $mensaje): ?>
                <tr>
                    <td><?= $this->Number->format($mensaje->id) ?></td>
                    <td><?= $mensaje->remitente === null ? '' : $this->Number->format($mensaje->remitente) ?></td>
                    <td><?= $mensaje->destinatario === null ? '' : $this->Number->format($mensaje->destinatario) ?></td>
                    <td><?= h($mensaje->fecha_hora) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $mensaje->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mensaje->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mensaje->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mensaje->id)]) ?>
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
