Commandes utiles:


php bin/console doctrine:database:create -> créé la base de données sur le serveur sql.

transformer une chaîne en slug

composer require cocur/slugify

composer require symfonycasts/verify-email-bundle


php bin/console make:form

->ProduitType

->Produit (il faudra reproduire la commande quand on aura les vraies entitées...)


mettre un theme sur les forms : 

fichier "twig.yaml"

en dessous de twig:

rajouter un arguement : form_themes:

exemple : 

    form_themes: ['bootstrap_5_layout.html.twig']


flex methods : 

framework.yaml 28:23 symfony 7 formulaires video yt


/!\ GESTION DES COMMIT /!\ : 

- COMMIT LES FICHIERS PAR THEMES AVEC DES MESSAGES DE COMMIT COHÉRENTS ET LISIBLES EX : (Service de mail, ajouter les fichiers concernés et faire un message de commit cohérent)
