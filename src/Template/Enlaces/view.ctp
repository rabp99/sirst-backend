<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enlace $enlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enlace'), ['action' => 'edit', $enlace->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enlace'), ['action' => 'delete', $enlace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enlace->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enlaces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enlace'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Antenas'), ['controller' => 'Antenas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Antena'), ['controller' => 'Antenas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enlaces view large-9 medium-8 columns content">
    <h3><?= h($enlace->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ssid') ?></th>
            <td><?= h($enlace->ssid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Channel Width') ?></th>
            <td><?= h($enlace->channel_width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enlace->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Antenas') ?></h4>
        <?php if (!empty($enlace->antenas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Punto Id') ?></th>
                <th scope="col"><?= __('Enlace Id') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Puerto Id') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col"><?= __('Device Name') ?></th>
                <th scope="col"><?= __('Mode') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($enlace->antenas as $antenas): ?>
            <tr>
                <td><?= h($antenas->id) ?></td>
                <td><?= h($antenas->punto_id) ?></td>
                <td><?= h($antenas->enlace_id) ?></td>
                <td><?= h($antenas->modelo_id) ?></td>
                <td><?= h($antenas->puerto_id) ?></td>
                <td><?= h($antenas->ip) ?></td>
                <td><?= h($antenas->device_name) ?></td>
                <td><?= h($antenas->mode) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Antenas', 'action' => 'view', $antenas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Antenas', 'action' => 'edit', $antenas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Antenas', 'action' => 'delete', $antenas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $antenas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
