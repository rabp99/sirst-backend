<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reguladore $reguladore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reguladores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Centrales'), ['controller' => 'Centrales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Centrale'), ['controller' => 'Centrales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puertos'), ['controller' => 'Puertos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puerto'), ['controller' => 'Puertos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reguladores form large-9 medium-8 columns content">
    <?= $this->Form->create($reguladore) ?>
    <fieldset>
        <legend><?= __('Add Reguladore') ?></legend>
        <?php
            echo $this->Form->control('central_id', ['options' => $centrales]);
            echo $this->Form->control('punto_id', ['options' => $puntos]);
            echo $this->Form->control('puerto_id', ['options' => $puertos]);
            echo $this->Form->control('codigo');
            echo $this->Form->control('ip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
