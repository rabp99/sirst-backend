<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruce[]|\Cake\Collection\CollectionInterface $cruces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cruce'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cruces index large-9 medium-8 columns content">
    <h3><?= __('Cruces') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('punto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regulador_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cruces as $cruce): ?>
            <tr>
                <td><?= $this->Number->format($cruce->id) ?></td>
                <td><?= $cruce->has('punto') ? $this->Html->link($cruce->punto->id, ['controller' => 'Puntos', 'action' => 'view', $cruce->punto->id]) : '' ?></td>
                <td><?= $cruce->has('reguladore') ? $this->Html->link($cruce->reguladore->id, ['controller' => 'Reguladores', 'action' => 'view', $cruce->reguladore->id]) : '' ?></td>
                <td><?= h($cruce->codigo) ?></td>
                <td><?= h($cruce->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cruce->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cruce->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cruce->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruce->id)]) ?>
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
