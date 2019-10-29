<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Puerto $puerto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Puerto'), ['action' => 'edit', $puerto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Puerto'), ['action' => 'delete', $puerto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puerto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Puertos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Puerto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List T Switches'), ['controller' => 'TSwitches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Switch'), ['controller' => 'TSwitches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="puertos view large-9 medium-8 columns content">
    <h3><?= h($puerto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nro Puerto') ?></th>
            <td><?= h($puerto->nro_puerto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Switch') ?></th>
            <td><?= $puerto->has('t_switch') ? $this->Html->link($puerto->t_switch->id, ['controller' => 'TSwitches', 'action' => 'view', $puerto->t_switch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($puerto->id) ?></td>
        </tr>
    </table>
</div>
