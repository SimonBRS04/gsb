<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Veuillez entrer un nouveau mot de passe') ?></legend>
        <?php if ($validatePassword) : ?>
            <?= $this->Form->control('current_password', [
                'type' => 'password',
                'required' => true,
                'label' => __d('cake_d_c/users', 'Mot de passe actuel')]);
            ?>
        <?php endif; ?>
        <?= $this->Form->control('password', [
            'type' => 'password',
            'required' => true,
            'label' => __d('cake_d_c/users', 'Nouveau mot de passe')]);
        ?>
        <?= $this->Form->control('password_confirm', [
            'type' => 'password',
            'required' => true,
            'label' => __d('cake_d_c/users', 'Confirmer le mot de passe')]);
        ?>

    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Valider')); ?>
    <?= $this->Form->end() ?>
</div>