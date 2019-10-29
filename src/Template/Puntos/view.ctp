<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Punto $punto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Punto'), ['action' => 'edit', $punto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Punto'), ['action' => 'delete', $punto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Antenas'), ['controller' => 'Antenas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Antena'), ['controller' => 'Antenas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruces'), ['controller' => 'Cruces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruce'), ['controller' => 'Cruces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List T Switches'), ['controller' => 'TSwitches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Switch'), ['controller' => 'TSwitches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="puntos view large-9 medium-8 columns content">
    <h3><?= h($punto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($punto->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($punto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitud') ?></th>
            <td><?= h($punto->latitud) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitud') ?></th>
            <td><?= h($punto->longitud) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($punto->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Antenas') ?></h4>
        <?php if (!empty($punto->antenas)): ?>
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
            <?php foreach ($punto->antenas as $antenas): ?>
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
    <div class="related">
        <h4><?= __('Related Cruces') ?></h4>
        <?php if (!empty($punto->cruces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Punto Id') ?></th>
                <th scope="col"><?= __('Regulador Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($punto->cruces as $cruces): ?>
            <tr>
                <td><?= h($cruces->id) ?></td>
                <td><?= h($cruces->punto_id) ?></td>
                <td><?= h($cruces->regulador_id) ?></td>
                <td><?= h($cruces->codigo) ?></td>
                <td><?= h($cruces->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cruces', 'action' => 'view', $cruces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cruces', 'action' => 'edit', $cruces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cruces', 'action' => 'delete', $cruces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reguladores') ?></h4>
        <?php if (!empty($punto->reguladores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Central Id') ?></th>
                <th scope="col"><?= __('Punto Id') ?></th>
                <th scope="col"><?= __('Puerto Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($punto->reguladores as $reguladores): ?>
            <tr>
                <td><?= h($reguladores->id) ?></td>
                <td><?= h($reguladores->modelo_id) ?></td>
                <td><?= h($reguladores->central_id) ?></td>
                <td><?= h($reguladores->punto_id) ?></td>
                <td><?= h($reguladores->puerto_id) ?></td>
                <td><?= h($reguladores->codigo) ?></td>
                <td><?= h($reguladores->ip) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reguladores', 'action' => 'view', $reguladores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reguladores', 'action' => 'edit', $reguladores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reguladores', 'action' => 'delete', $reguladores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reguladores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related T Switches') ?></h4>
        <?php if (!empty($punto->t_switches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Punto Id') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($punto->t_switches as $tSwitches): ?>
            <tr>
                <td><?= h($tSwitches->id) ?></td>
                <td><?= h($tSwitches->modelo_id) ?></td>
                <td><?= h($tSwitches->punto_id) ?></td>
                <td><?= h($tSwitches->ip) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TSwitches', 'action' => 'view', $tSwitches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TSwitches', 'action' => 'edit', $tSwitches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TSwitches', 'action' => 'delete', $tSwitches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tSwitches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
