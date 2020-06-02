<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estado $estado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Antenas'), ['controller' => 'Antenas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Antena'), ['controller' => 'Antenas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Centrales'), ['controller' => 'Centrales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Centrale'), ['controller' => 'Centrales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruces'), ['controller' => 'Cruces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruce'), ['controller' => 'Cruces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enlaces'), ['controller' => 'Enlaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enlace'), ['controller' => 'Enlaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marcas'), ['controller' => 'Marcas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marcas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reguladores'), ['controller' => 'Reguladores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reguladore'), ['controller' => 'Reguladores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List T Switches'), ['controller' => 'TSwitches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New T Switch'), ['controller' => 'TSwitches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estados view large-9 medium-8 columns content">
    <h3><?= h($estado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($estado->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estado->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Antenas') ?></h4>
        <?php if (!empty($estado->antenas)): ?>
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
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->antenas as $antenas): ?>
            <tr>
                <td><?= h($antenas->id) ?></td>
                <td><?= h($antenas->punto_id) ?></td>
                <td><?= h($antenas->enlace_id) ?></td>
                <td><?= h($antenas->modelo_id) ?></td>
                <td><?= h($antenas->puerto_id) ?></td>
                <td><?= h($antenas->ip) ?></td>
                <td><?= h($antenas->device_name) ?></td>
                <td><?= h($antenas->mode) ?></td>
                <td><?= h($antenas->estado_id) ?></td>
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
        <h4><?= __('Related Centrales') ?></h4>
        <?php if (!empty($estado->centrales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Nro') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->centrales as $centrales): ?>
            <tr>
                <td><?= h($centrales->id) ?></td>
                <td><?= h($centrales->descripcion) ?></td>
                <td><?= h($centrales->nro) ?></td>
                <td><?= h($centrales->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Centrales', 'action' => 'view', $centrales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Centrales', 'action' => 'edit', $centrales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Centrales', 'action' => 'delete', $centrales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $centrales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cruces') ?></h4>
        <?php if (!empty($estado->cruces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Regulador Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->cruces as $cruces): ?>
            <tr>
                <td><?= h($cruces->id) ?></td>
                <td><?= h($cruces->regulador_id) ?></td>
                <td><?= h($cruces->codigo) ?></td>
                <td><?= h($cruces->descripcion) ?></td>
                <td><?= h($cruces->estado_id) ?></td>
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
        <h4><?= __('Related Enlaces') ?></h4>
        <?php if (!empty($estado->enlaces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ssid') ?></th>
                <th scope="col"><?= __('Channel Width') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->enlaces as $enlaces): ?>
            <tr>
                <td><?= h($enlaces->id) ?></td>
                <td><?= h($enlaces->ssid) ?></td>
                <td><?= h($enlaces->channel_width) ?></td>
                <td><?= h($enlaces->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Enlaces', 'action' => 'view', $enlaces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Enlaces', 'action' => 'edit', $enlaces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enlaces', 'action' => 'delete', $enlaces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enlaces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Marcas') ?></h4>
        <?php if (!empty($estado->marcas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->marcas as $marcas): ?>
            <tr>
                <td><?= h($marcas->id) ?></td>
                <td><?= h($marcas->descripcion) ?></td>
                <td><?= h($marcas->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Marcas', 'action' => 'view', $marcas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Marcas', 'action' => 'edit', $marcas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Marcas', 'action' => 'delete', $marcas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marcas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Modelos') ?></h4>
        <?php if (!empty($estado->modelos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Marca Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Observacion') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->modelos as $modelos): ?>
            <tr>
                <td><?= h($modelos->id) ?></td>
                <td><?= h($modelos->marca_id) ?></td>
                <td><?= h($modelos->descripcion) ?></td>
                <td><?= h($modelos->observacion) ?></td>
                <td><?= h($modelos->estado_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Puntos') ?></h4>
        <?php if (!empty($estado->puntos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Latitud') ?></th>
                <th scope="col"><?= __('Longitud') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->puntos as $puntos): ?>
            <tr>
                <td><?= h($puntos->id) ?></td>
                <td><?= h($puntos->codigo) ?></td>
                <td><?= h($puntos->descripcion) ?></td>
                <td><?= h($puntos->latitud) ?></td>
                <td><?= h($puntos->longitud) ?></td>
                <td><?= h($puntos->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Puntos', 'action' => 'view', $puntos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Puntos', 'action' => 'edit', $puntos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Puntos', 'action' => 'delete', $puntos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puntos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reguladores') ?></h4>
        <?php if (!empty($estado->reguladores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Central Id') ?></th>
                <th scope="col"><?= __('Punto Id') ?></th>
                <th scope="col"><?= __('Puerto Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->reguladores as $reguladores): ?>
            <tr>
                <td><?= h($reguladores->id) ?></td>
                <td><?= h($reguladores->modelo_id) ?></td>
                <td><?= h($reguladores->central_id) ?></td>
                <td><?= h($reguladores->punto_id) ?></td>
                <td><?= h($reguladores->puerto_id) ?></td>
                <td><?= h($reguladores->codigo) ?></td>
                <td><?= h($reguladores->ip) ?></td>
                <td><?= h($reguladores->estado_id) ?></td>
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
        <?php if (!empty($estado->t_switches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Punto Id') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->t_switches as $tSwitches): ?>
            <tr>
                <td><?= h($tSwitches->id) ?></td>
                <td><?= h($tSwitches->modelo_id) ?></td>
                <td><?= h($tSwitches->punto_id) ?></td>
                <td><?= h($tSwitches->ip) ?></td>
                <td><?= h($tSwitches->estado_id) ?></td>
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
