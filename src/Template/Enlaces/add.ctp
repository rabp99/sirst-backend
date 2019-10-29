<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enlace $enlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Enlaces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Antenas'), ['controller' => 'Antenas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Antena'), ['controller' => 'Antenas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enlaces form large-9 medium-8 columns content">
    <?= $this->Form->create($enlace) ?>
    <fieldset>
        <legend><?= __('Add Enlace') ?></legend>
        <?php
            echo $this->Form->control('ssid');
            echo $this->Form->control('channel_width');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
