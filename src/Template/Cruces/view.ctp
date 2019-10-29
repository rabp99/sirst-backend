<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruce $cruce
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cruce'), ['action' => 'edit', $cruce->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cruce'), ['action' => 'delete', $cruce->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruce->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cruces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruce'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cruces view large-9 medium-8 columns content">
    <h3><?= h($cruce->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Punto') ?></th>
            <td><?= $cruce->has('punto') ? $this->Html->link($cruce->punto->id, ['controller' => 'Puntos', 'action' => 'view', $cruce->punto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reguladore') ?></th>
            <td><?= $cruce->has('reguladore') ? $this->Html->link($cruce->reguladore->id, ['controller' => 'Reguladores', 'action' => 'view', $cruce->reguladore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($cruce->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($cruce->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cruce->id) ?></td>
        </tr>
    </table>
</div>
