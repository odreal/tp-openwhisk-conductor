BERTIN MAXIME 5ACTO
## TP - Openwhisk conductor et environnement spécifique

Ce tp vise à utiliser un runtime customisé et à utiliser le principe de conductor avec Openwhisk.

### Fonctionnement :
Un nom de ville est généré de manière aléatoire (via SPARQL sur wikidata).
Ce nom de ville est ensuite passé dans l'API api-ninja city qui permet d'extraire des informations sur les grandes villes.
Si on considère cette ville comme étant grande on essaye de récupérer la météo via l'API d'openweather, sinon, on récupère via l'API de query Google, la première image qui résulte de ce nom de ville.
On formatte le tout pour obtenir un texte lisible avec 2 versions de texte, une pour les grandes villes avec la température et une pour les petites villes avec une image.

### Installation :
Il est nécéssaire d'avoir Openwhisk d'installer sur son serveur, pour le reste il suffit d'executer le fichier de deploy comme ci-dessous :
`$ ./deploy.sh`

Puis de lancer l'action via la commande suivante :
`$ wsk -i action invoke conductor -r`

Pour l'exécution de certaines actions JS il a été nécessaire d'ajouter la librairie axios, cela a été l'occasion de créer un dockerfile permettant l'installation d'axios.
Ce dockerfile est directement hebergé sur docker hub et est utilisée lors de la création des certaines actions JS.

