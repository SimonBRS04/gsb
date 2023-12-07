<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Créateur de Fiches';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>AP</span>GSB</a>
        </div>
        <div class="top-nav-links">
        <?php
        echo $this->Html->Link('myFichesList (Usr)', ['plugin' => NULL, 'controller'=>'fiches', 'action'=>'myficheslist']);
        echo $this->Html->Link('Ficheslist (/)', ['plugin' => NULL, 'controller'=>'fiches', 'action'=>'ficheslist']);
        echo $this->Html->Link('Fiches (/)', ['plugin' => NULL, 'controller'=>'fiches']);
        echo $this->Html->Link('LignesF (/)', ['plugin' => NULL, 'controller'=>'lignesforfaits']);
        echo $this->Html->Link('LignesHF (/)', ['plugin' => NULL, 'controller'=>'lignesfraishorsforfaits']);
        echo $this->Html->Link('Etats (x)', ['plugin' => NULL, 'controller'=>'etats']);
        echo $this->Html->Link('Forfaits (x)', ['plugin' => NULL, 'controller'=>'forfaits']);
        echo $this->Html->Link('Users (x)', ['plugin'=>'CakeDC/Users', 'controller'=>'users', 'action'=>'index']);    
        echo $this->Html->Link('Profil (o)', ['plugin'=>'CakeDC/Users', 'controller'=>'users', 'action'=>'profile']);            
        echo $this->Html->Link(
            'Disconnect', 
            ['plugin'=>'CakeDC/Users', 'controller'=>'users', 'action'=>'logout'], 
            ['onclick' => "return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');"]
        );        
        ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
