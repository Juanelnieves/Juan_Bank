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
            <?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usuario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios view content">
            <h3><?= h($usuario->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($usuario->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($usuario->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dni') ?></th>
                    <td><?= h($usuario->dni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($usuario->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foto') ?></th>
                    <td><?= h($usuario->foto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($usuario->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Postal') ?></th>
                    <td><?= h($usuario->codigo_postal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ciudad') ?></th>
                    <td><?= h($usuario->ciudad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Provincia') ?></th>
                    <td><?= h($usuario->provincia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pais') ?></th>
                    <td><?= h($usuario->pais) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iban') ?></th>
                    <td><?= h($usuario->iban) ?></td>
                </tr>
                <tr>
                    <th><?= __('Moneda Preferida') ?></th>
                    <td><?= h($usuario->moneda_preferida) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saldo Hexadecimal') ?></th>
                    <td><?= h($usuario->saldo_hexadecimal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usuario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saldo') ?></th>
                    <td><?= $usuario->saldo === null ? '' : $this->Number->format($usuario->saldo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Nacimiento') ?></th>
                    <td><?= h($usuario->fecha_nacimiento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Es Admin') ?></th>
                    <td><?= $usuario->es_admin ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
