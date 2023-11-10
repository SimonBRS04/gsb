<?php
echo '<script>alert("L\'Utilisateur a bien été ajouté"); window.location.href = "' . $this->Url->build(['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login']) . '";</script>';
?>