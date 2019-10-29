<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca $marca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Marca'), ['action' => 'edit', $marca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Marca'), ['action' => 'delete', $marca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marca->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Marcas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marca'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="marcas view large-9 medium-8 columns content">
    <h3><?= h($marca->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($marca->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($marca->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Modelos') ?></h4>
        <?php if (!empty($marca->modelos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Marca Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Observacion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($marca->modelos as $modelos): ?>
            <tr>
                <td><?= h($modelos->id) ?></td>
                <td><?= h($modelos->marca_id) ?></td>
                <td><?= h($modelos->descripcion) ?></td>
                <td><?= h($modelos->observacion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Modelos', 'action' => 'view', $modelos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Modelos', 'action' => 'edit', $modelos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modelos', 'action' => 'delete', $modelos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
