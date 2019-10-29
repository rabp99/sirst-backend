<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Antena[]|\Cake\Collection\CollectionInterface $antenas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Antena'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enlaces'), ['controller' => 'Enlaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enlace'), ['controller' => 'Enlaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puertos'), ['controller' => 'Puertos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puerto'), ['controller' => 'Puertos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="antenas index large-9 medium-8 columns content">
    <h3><?= __('Antenas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('punto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enlace_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modelo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puerto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mode') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($antenas as $antena): ?>
            <tr>
                <td><?= $this->Number->format($antena->id) ?></td>
                <td><?= $antena->has('punto') ? $this->Html->link($antena->punto->id, ['controller' => 'Puntos', 'action' => 'view', $antena->punto->id]) : '' ?></td>
                <td><?= $antena->has('enlace') ? $this->Html->link($antena->enlace->id, ['controller' => 'Enlaces', 'action' => 'view', $antena->enlace->id]) : '' ?></td>
                <td><?= $antena->has('modelo') ? $this->Html->link($antena->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $antena->modelo->id]) : '' ?></td>
                <td><?= $antena->has('puerto') ? $this->Html->link($antena->puerto->id, ['controller' => 'Puertos', 'action' => 'view', $antena->puerto->id]) : '' ?></td>
                <td><?= h($antena->ip) ?></td>
                <td><?= h($antena->device_name) ?></td>
                <td><?= h($antena->mode) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $antena->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $antena->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $antena->id], ['confirm' => __('Are you sure you want to delete # {0}?', $antena->id)]) ?>
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
