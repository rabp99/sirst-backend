<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reguladore[]|\Cake\Collection\CollectionInterface $reguladores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reguladore'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Centrales'), ['controller' => 'Centrales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Centrale'), ['controller' => 'Centrales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puertos'), ['controller' => 'Puertos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puerto'), ['controller' => 'Puertos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reguladores index large-9 medium-8 columns content">
    <h3><?= __('Reguladores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modelo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('central_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('punto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puerto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reguladores as $reguladore): ?>
            <tr>
                <td><?= $this->Number->format($reguladore->id) ?></td>
                <td><?= $reguladore->has('modelo') ? $this->Html->link($reguladore->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $reguladore->modelo->id]) : '' ?></td>
                <td><?= $reguladore->has('centrale') ? $this->Html->link($reguladore->centrale->id, ['controller' => 'Centrales', 'action' => 'view', $reguladore->centrale->id]) : '' ?></td>
                <td><?= $reguladore->has('punto') ? $this->Html->link($reguladore->punto->id, ['controller' => 'Puntos', 'action' => 'view', $reguladore->punto->id]) : '' ?></td>
                <td><?= $reguladore->has('puerto') ? $this->Html->link($reguladore->puerto->id, ['controller' => 'Puertos', 'action' => 'view', $reguladore->puerto->id]) : '' ?></td>
                <td><?= h($reguladore->codigo) ?></td>
                <td><?= h($reguladore->ip) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reguladore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reguladore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reguladore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reguladore->id)]) ?>
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
