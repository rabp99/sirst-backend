<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enlace[]|\Cake\Collection\CollectionInterface $enlaces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Enlace'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Antenas'), ['controller' => 'Antenas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Antena'), ['controller' => 'Antenas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enlaces index large-9 medium-8 columns content">
    <h3><?= __('Enlaces') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ssid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('channel_width') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enlaces as $enlace): ?>
            <tr>
                <td><?= $this->Number->format($enlace->id) ?></td>
                <td><?= h($enlace->ssid) ?></td>
                <td><?= h($enlace->channel_width) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enlace->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enlace->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enlace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enlace->id)]) ?>
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
