<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reguladore $reguladore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reguladore'), ['action' => 'edit', $reguladore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reguladore'), ['action' => 'delete', $reguladore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reguladore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reguladores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reguladore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Centrales'), ['controller' => 'Centrales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Centrale'), ['controller' => 'Centrales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puertos'), ['controller' => 'Puertos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Puerto'), ['controller' => 'Puertos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reguladores view large-9 medium-8 columns content">
    <h3><?= h($reguladore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $reguladore->has('modelo') ? $this->Html->link($reguladore->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $reguladore->modelo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Centrale') ?></th>
            <td><?= $reguladore->has('centrale') ? $this->Html->link($reguladore->centrale->id, ['controller' => 'Centrales', 'action' => 'view', $reguladore->centrale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Punto') ?></th>
            <td><?= $reguladore->has('punto') ? $this->Html->link($reguladore->punto->id, ['controller' => 'Puntos', 'action' => 'view', $reguladore->punto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puerto') ?></th>
            <td><?= $reguladore->has('puerto') ? $this->Html->link($reguladore->puerto->id, ['controller' => 'Puertos', 'action' => 'view', $reguladore->puerto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($reguladore->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($reguladore->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reguladore->id) ?></td>
        </tr>
    </table>
</div>
