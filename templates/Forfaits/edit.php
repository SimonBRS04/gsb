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
            <?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $forfait->id],
                ['confirm' => __('Voulez-vous vraiment supprimer le forfait "{0}" ?', $forfait->type), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Liste des Forfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forfaits form content">
            <?= $this->Form->create($forfait) ?>
            <fieldset>
                <legend><?= __('Edition de Forfait') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('prix');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Envoyer')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
