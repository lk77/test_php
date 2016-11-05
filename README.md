# test_php

Le projet utilise une petite base de données avec deux tables.
l'application est configurée pour utiliser la base de données locale avec comme identifiants root/root
Dans le dossier entity, il y a un fichier import.php qui permet de créer la base et d'importer un jeu de données.
Si les identifiants ne sont pas root/root, je n'ai pas eu le temps de créer un fichier de configuration unique, 
il est nécessaire de les changer à 3 endroits différents:
- imageDAO.php
- articleDAO.php
- import.php

Je n'ai pas eu le temps de mettre en place une api et de faire des appels pour charger les images,
Sinon tout le reste à été réalisé.
