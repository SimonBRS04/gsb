<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('<--- Retour'), ['action' => 'index', $fich->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesfraishorsforfaits form content">
            <?= $this->Form->create($lignesfraishorsforfait) ?>
            <fieldset>
                <legend><?= __('Ajouter une autre dépense') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('montant');
                    echo $this->Form->control('libelle');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
