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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mensaje->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mensaje->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Mensajes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="mensajes form content">
            <?= $this->Form->create($mensaje) ?>
            <fieldset>
                <legend><?= __('Edit Mensaje') ?></legend>
                <?php
                    echo $this->Form->control('remitente');
                    echo $this->Form->control('destinatario');
                    echo $this->Form->control('mensaje');
                    echo $this->Form->control('fecha_hora', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
