<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TSwitch $tSwitch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tSwitch->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tSwitch->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List T Switches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tSwitches form large-9 medium-8 columns content">
    <?= $this->Form->create($tSwitch) ?>
    <fieldset>
        <legend><?= __('Edit T Switch') ?></legend>
        <?php
            echo $this->Form->control('ip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
