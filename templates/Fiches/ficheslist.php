<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fich> $fiches
 */
?>
    <br/>
    <?= $this->Form->create(null) ?>
        <label for="user_choisi">Sélectionnez un utilisateur :</label>
        <select id="user_choisi" name="user_choisi">
            <option value="user1">user1</option>
            <option value="user2">user2</option>
        </select>
        <label for="annee_choisie">Sélectionnez une année :</label>
        <select id="annee_choisie" name="annee_choisie">
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>
        <br/><?= $this->Form->button(__('Rechercher')) ?>
    <?= $this->Form->end();?>
    <?php 
    $prix_final_total = 0;
    foreach ($fiches as $fich): 
        $prix_final_total = $prix_final_total + $fich->montanttotal;
    endforeach; 
    if ($this->request->is(['patch', 'post', 'put'])) {
    ?>
        <label>Le montant total des fiches de <?= $_POST['user_choisi']?> pour l'année <?= $_POST['annee_choisie']?> est de <?= $prix_final_total ?> €</label><br/>
    <?php
    }
?>
<!-- FIN COMPTABLE ONLY -->
<div class="fiches index content">
    <h3><?= __('Toutes les Fiches client') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('moisannee') ?></th>
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th><?= $this->Paginator->sort('datemodif') ?></th>
                    <th><?= $this->Paginator->sort('montanttotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fich): ?>
                <tr>
                    <td><?= h($fich->user->username)?></td>
                    <td><?= h($fich->moisannee) ?></td>
                    <td><?= h($fich->etat->libelle)?></td>
                    <td><?= h($fich->datemodif) ?></td>
                    <td><?= h($fich->montanttotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'myfichesview', $fich->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('dernier') . ' >>') ?>

        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, affichage de {{current}} ligne(s) sur {{count}} au total')) ?></p>
    </div>
</div>



