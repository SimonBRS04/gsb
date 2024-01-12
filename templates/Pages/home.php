<div class="pages index content">

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
    $role = $identity["role"];
    if ($role == "comptable"){
      ?><h3> Toutes les factures : </h3><?php 
      echo $this->Html->Link(__('Factures'), ['plugin' => NULL, 'controller'=>'fiches', 'action'=>'ficheslist'], ['class' => 'button']);
    }
    if ($role == "user"){
      ?><h3> Mes factures : </h3><?php 
      echo $this->Html->Link(__('Mes factures'), ['plugin' => NULL, 'controller'=>'fiches', 'action'=>'myficheslist'], ['class' => 'button']);
    }
    if ($role == "superuser"){
      ?><h3> Toutes les factures : </h3><?php 
      echo $this->Html->Link(__('Factures'), ['plugin' => NULL, 'controller'=>'fiches', 'action'=>'index'], ['class' => 'button']);
    }
  ?>
  
</div>
