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
    <h3><?= __d('cake_d_c/users', 'Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__d('cake_d_c/users', 'Liste des Utilisateurs'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create(${$tableAlias}); ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Ajout d\'un utilisateur') ?></legend>
        <?php
            echo $this->Form->control('last_name', ['label' => __d('cake_d_c/users', 'Nom')]);
            echo $this->Form->control('first_name', ['label' => __d('cake_d_c/users', 'Prénom')]);
            echo $this->Form->control('email', ['label' => __d('cake_d_c/users', 'Email')]);
            echo $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Identifiant')]);
            echo $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Mot de Passe')]);
            echo $this->Form->control('active', [
                'type' => 'checkbox',
                'label' => __d('cake_d_c/users', 'Active')
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'S\'inscrire')) ?>
    <?= $this->Form->end() ?>
</div>
