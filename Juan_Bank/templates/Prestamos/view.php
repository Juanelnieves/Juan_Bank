<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prestamo $prestamo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Prestamo'), ['action' => 'edit', $prestamo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prestamo'), ['action' => 'delete', $prestamo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prestamos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prestamo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prestamos view content">
            <h3><?= h($prestamo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($prestamo->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($prestamo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $prestamo->id_usuario === null ? '' : $this->Number->format($prestamo->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $prestamo->cantidad === null ? '' : $this->Number->format($prestamo->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Vencimiento') ?></th>
                    <td><?= h($prestamo->fecha_vencimiento) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Motivo') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($prestamo->motivo)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
