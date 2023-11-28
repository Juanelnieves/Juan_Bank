<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaccione $transaccione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transaccione'), ['action' => 'edit', $transaccione->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transaccione'), ['action' => 'delete', $transaccione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaccione->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transacciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transaccione'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="transacciones view content">
            <h3><?= h($transaccione->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($transaccione->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transaccione->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $transaccione->id_usuario === null ? '' : $this->Number->format($transaccione->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $transaccione->cantidad === null ? '' : $this->Number->format($transaccione->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Hora') ?></th>
                    <td><?= h($transaccione->fecha_hora) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
