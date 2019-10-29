<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Punto $punto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['action' => 'index']) ?></li>
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
<div class="puntos form large-9 medium-8 columns content">
    <?= $this->Form->create($punto) ?>
    <fieldset>
        <legend><?= __('Add Punto') ?></legend>
        <?php
            echo $this->Form->control('codigo');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('latitud');
            echo $this->Form->control('longitud');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
