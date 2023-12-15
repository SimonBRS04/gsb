<?php

$this->set('showHeader', false);

/**
 * Copyright 2010 - 2020, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2020, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * @var \CakeDC\Users\Model\Entity\User $user
 */
?>
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Entrez votre mot de passe ou Identifiant pour réinitialiser votre Mot de Passe') ?></legend>
        <?= $this->Form->control('reference') ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Envoyer')); ?>
    <?= $this->Form->end() ?>
</div>
