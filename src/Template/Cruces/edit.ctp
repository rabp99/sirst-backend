<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruce $cruce
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cruce->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cruce->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cruces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cruces form large-9 medium-8 columns content">
    <?= $this->Form->create($cruce) ?>
    <fieldset>
        <legend><?= __('Edit Cruce') ?></legend>
        <?php
            echo $this->Form->control('punto_id', ['options' => $puntos]);
            echo $this->Form->control('regulador_id', ['options' => $reguladores]);
            echo $this->Form->control('codigo');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
