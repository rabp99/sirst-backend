<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TSwitch $tSwitch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit T Switch'), ['action' => 'edit', $tSwitch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete T Switch'), ['action' => 'delete', $tSwitch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tSwitch->id)]) ?> </li>
        <li><?= $this->Html->link(__('List T Switches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Switch'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tSwitches view large-9 medium-8 columns content">
    <h3><?= h($tSwitch->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $tSwitch->has('modelo') ? $this->Html->link($tSwitch->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $tSwitch->modelo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Punto') ?></th>
            <td><?= $tSwitch->has('punto') ? $this->Html->link($tSwitch->punto->id, ['controller' => 'Puntos', 'action' => 'view', $tSwitch->punto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($tSwitch->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tSwitch->id) ?></td>
        </tr>
    </table>
</div>
