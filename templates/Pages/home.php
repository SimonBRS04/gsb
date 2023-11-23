<head>
    <?php $identity = $this->getRequest()->getAttribute('identity'); ?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        GSB - Accueil
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<h1>Bienvenue sur le site web <?= h($identity['username']) ?> !</h1>

<?php 

?>