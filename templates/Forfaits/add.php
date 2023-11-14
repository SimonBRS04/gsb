<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forfait $forfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Liste des Forfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forfaits form content">
            <?= $this->Form->create($forfait) ?>
            <fieldset>
                <legend><?= __('Ajouter un Forfait') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('prix');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Sauvegarder')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
