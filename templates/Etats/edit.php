<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etat $etat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Liste des Etats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                __("Supprimer cet Etat"),
                ['action' => 'delete', $etat->id],
                ['confirm' => __('Voulez-vous vraiment supprimer l\'Etat "{0}" ?', $etat->libelle), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etats form content">
            <?= $this->Form->create($etat) ?>
            <fieldset>
                <legend><?= __('Modification de l\'Etat') ?></legend>
                <?php
                    echo $this->Form->control('libelle');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Sauvegarder')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
