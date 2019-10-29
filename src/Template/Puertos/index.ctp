<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Puerto[]|\Cake\Collection\CollectionInterface $puertos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Puerto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List T Switches'), ['controller' => 'TSwitches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T Switch'), ['controller' => 'TSwitches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="puertos index large-9 medium-8 columns content">
    <h3><?= __('Puertos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nro_puerto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_switche_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($puertos as $puerto): ?>
            <tr>
                <td><?= $this->Number->format($puerto->id) ?></td>
                <td><?= h($puerto->nro_puerto) ?></td>
                <td><?= $puerto->has('t_switch') ? $this->Html->link($puerto->t_switch->id, ['controller' => 'TSwitches', 'action' => 'view', $puerto->t_switch->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $puerto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $puerto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $puerto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puerto->id)]) ?>
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
