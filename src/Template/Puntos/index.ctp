<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Punto[]|\Cake\Collection\CollectionInterface $puntos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Antenas'), ['controller' => 'Antenas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Antena'), ['controller' => 'Antenas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruces'), ['controller' => 'Cruces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruce'), ['controller' => 'Cruces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List T Switches'), ['controller' => 'TSwitches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T Switch'), ['controller' => 'TSwitches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="puntos index large-9 medium-8 columns content">
    <h3><?= __('Puntos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitud') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitud') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($puntos as $punto): ?>
            <tr>
                <td><?= $this->Number->format($punto->id) ?></td>
                <td><?= h($punto->codigo) ?></td>
                <td><?= h($punto->descripcion) ?></td>
                <td><?= h($punto->latitud) ?></td>
                <td><?= h($punto->longitud) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $punto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $punto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $punto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punto->id)]) ?>
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
