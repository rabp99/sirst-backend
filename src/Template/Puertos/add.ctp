<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Puerto $puerto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Puertos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List T Switches'), ['controller' => 'TSwitches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New T Switch'), ['controller' => 'TSwitches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="puertos form large-9 medium-8 columns content">
    <?= $this->Form->create($puerto) ?>
    <fieldset>
        <legend><?= __('Add Puerto') ?></legend>
        <?php
            echo $this->Form->control('nro_puerto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
