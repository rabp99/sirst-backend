<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Antena $antena
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Antenas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enlaces'), ['controller' => 'Enlaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enlace'), ['controller' => 'Enlaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puertos'), ['controller' => 'Puertos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puerto'), ['controller' => 'Puertos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="antenas form large-9 medium-8 columns content">
    <?= $this->Form->create($antena) ?>
    <fieldset>
        <legend><?= __('Add Antena') ?></legend>
        <?php
            echo $this->Form->control('puerto_id', ['options' => $puertos]);
            echo $this->Form->control('ip');
            echo $this->Form->control('device_name');
            echo $this->Form->control('mode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
