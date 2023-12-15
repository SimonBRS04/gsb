<?php
/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="actions columns large-2 medium-3">
    <h3><?= __d('cake_d_c/users', 'Liste des Utilisateurs') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__d('cake_d_c/users', 'Ajouter un nouvel Utilisateur'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('username', __d('cake_d_c/users', 'Identifiant')) ?></th>
            <th><?= $this->Paginator->sort('email', __d('cake_d_c/users', 'Email')) ?></th>
            <th><?= $this->Paginator->sort('first_name', __d('cake_d_c/users', 'Prénom')) ?></th>
            <th><?= $this->Paginator->sort('last_name', __d('cake_d_c/users', 'Nom')) ?></th>
            <th class="actions"><?= __d('cake_d_c/users', 'Menu') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (${$tableAlias} as $user) : ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('cake_d_c/users', 'Changer MDP'), ['action' => 'changePassword', $user->id]) ?>
                    <?= $this->Html->link(__d('cake_d_c/users', 'Voir'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__d('cake_d_c/users', 'Modifier Profil'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__d('cake_d_c/users', 'Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __d('cake_d_c/users', 'Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __d('cake_d_c/users', 'précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__d('cake_d_c/users', 'suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, affichage de {{current}} ligne(s) sur {{count}} au total')) ?></p>
    </div>
</div>
