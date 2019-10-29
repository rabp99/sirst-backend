<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Antena $antena
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Antena'), ['action' => 'edit', $antena->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Antena'), ['action' => 'delete', $antena->id], ['confirm' => __('Are you sure you want to delete # {0}?', $antena->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Antenas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Antena'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enlaces'), ['controller' => 'Enlaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enlace'), ['controller' => 'Enlaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puertos'), ['controller' => 'Puertos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Puerto'), ['controller' => 'Puertos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="antenas view large-9 medium-8 columns content">
    <h3><?= h($antena->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Punto') ?></th>
            <td><?= $antena->has('punto') ? $this->Html->link($antena->punto->id, ['controller' => 'Puntos', 'action' => 'view', $antena->punto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enlace') ?></th>
            <td><?= $antena->has('enlace') ? $this->Html->link($antena->enlace->id, ['controller' => 'Enlaces', 'action' => 'view', $antena->enlace->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $antena->has('modelo') ? $this->Html->link($antena->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $antena->modelo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puerto') ?></th>
            <td><?= $antena->has('puerto') ? $this->Html->link($antena->puerto->id, ['controller' => 'Puertos', 'action' => 'view', $antena->puerto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($antena->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device Name') ?></th>
            <td><?= h($antena->device_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mode') ?></th>
            <td><?= h($antena->mode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($antena->id) ?></td>
        </tr>
    </table>
</div>
