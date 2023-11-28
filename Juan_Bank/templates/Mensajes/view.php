<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mensaje $mensaje
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mensaje'), ['action' => 'edit', $mensaje->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mensaje'), ['action' => 'delete', $mensaje->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mensaje->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mensajes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mensaje'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="mensajes view content">
            <h3><?= h($mensaje->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($mensaje->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Remitente') ?></th>
                    <td><?= $mensaje->remitente === null ? '' : $this->Number->format($mensaje->remitente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destinatario') ?></th>
                    <td><?= $mensaje->destinatario === null ? '' : $this->Number->format($mensaje->destinatario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Hora') ?></th>
                    <td><?= h($mensaje->fecha_hora) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Mensaje') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($mensaje->mensaje)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
