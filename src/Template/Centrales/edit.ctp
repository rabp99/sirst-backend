<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centrale $centrale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $centrale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $centrale->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Centrales'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="centrales form large-9 medium-8 columns content">
    <?= $this->Form->create($centrale) ?>
    <fieldset>
        <legend><?= __('Edit Centrale') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('nro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
