<?php

$this->set('showHeader', false);

/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;

?>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Ajouter un Utilisateur') ?></legend>
        <?php
        echo $this->Form->control('last_name', ['label' => __d('cake_d_c/users', 'Nom')]);
        echo $this->Form->control('first_name', ['label' => __d('cake_d_c/users', 'Prénom')]);
        echo $this->Form->control('email', ['label' => __d('cake_d_c/users', 'Email')]);
        echo $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Identifiant')]);
        echo $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Mot de passe')]);
        echo $this->Form->control('password_confirm', ['required' => true, 'type' => 'password', 'label' => __d('cake_d_c/users', 'Confirmer le Mot de passe')]);
        if (Configure::read('Users.Tos.required')) {
            echo $this->Form->control('tos', ['type' => 'checkbox', 'label' => __d('cake_d_c/users', 'Accepter les conditions ?'), 'required' => true]);
        }
        if (Configure::read('Users.reCaptcha.registration')) {
            echo $this->User->addReCaptcha();
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'S\'inscrire')) ?>
    <?= $this->Form->end() ?>
</div>
