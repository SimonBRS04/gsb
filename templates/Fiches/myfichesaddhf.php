<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('<--- Retour'), ['action' => 'myfichesview', $id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignesfraishorsforfaits form content">
            <?= $this->Form->create(NULL) ?>
            <fieldset>
                <legend><?= __('Ajouter une autre dépense') ?></legend>
                <?php
                    echo $this->Form->control('date', ['type' => 'date', 'format' => 'Y-m-d']);
                    echo $this->Form->control('montant');
                    echo $this->Form->control('libelle');
                    echo $this->Form->hidden('fiches._ids', ['value' =>$id, 'name'=>'fiches[_ids][]']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
<!-- fiches[_ids][] -->