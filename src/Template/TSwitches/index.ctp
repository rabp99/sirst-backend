<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TSwitch[]|\Cake\Collection\CollectionInterface $tSwitches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New T Switch'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tSwitches index large-9 medium-8 columns content">
    <h3><?= __('T Switches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modelo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('punto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tSwitches as $tSwitch): ?>
            <tr>
                <td><?= $this->Number->format($tSwitch->id) ?></td>
                <td><?= $tSwitch->has('modelo') ? $this->Html->link($tSwitch->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $tSwitch->modelo->id]) : '' ?></td>
                <td><?= $tSwitch->has('punto') ? $this->Html->link($tSwitch->punto->id, ['controller' => 'Puntos', 'action' => 'view', $tSwitch->punto->id]) : '' ?></td>
                <td><?= h($tSwitch->ip) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tSwitch->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tSwitch->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tSwitch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tSwitch->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
