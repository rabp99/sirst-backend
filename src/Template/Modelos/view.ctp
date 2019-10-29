<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modelo'), ['action' => 'edit', $modelo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modelo'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marcas'), ['controller' => 'Marcas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marcas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modelos view large-9 medium-8 columns content">
    <h3><?= h($modelo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $modelo->has('marca') ? $this->Html->link($modelo->marca->id, ['controller' => 'Marcas', 'action' => 'view', $modelo->marca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($modelo->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacion') ?></th>
            <td><?= h($modelo->observacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modelo->id) ?></td>
        </tr>
    </table>
</div>
