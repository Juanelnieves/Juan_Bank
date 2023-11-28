<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Add Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('dni');
                    echo $this->Form->control('email');
                    echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                    echo $this->Form->control('foto');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('codigo_postal');
                    echo $this->Form->control('ciudad');
                    echo $this->Form->control('provincia');
                    echo $this->Form->control('pais');
                    echo $this->Form->control('iban');
                    echo $this->Form->control('es_admin');
                    echo $this->Form->control('saldo');
                    echo $this->Form->control('moneda_preferida');
                    echo $this->Form->control('saldo_hexadecimal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
