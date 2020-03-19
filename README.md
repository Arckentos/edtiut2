# edtiut
## Fonctions implémentées
* Gestion des cours et des salles via EasyAdmin
* Insertion des cours, matières, salles, professeurs et avis par EasyAdmin
* Création des routes (salle et cours) dans l'API pour permettre l'accès aux données nécéssaires à l'appli
* Gestion de l'emploi du temps et affichage des cours (format jour/semaine, Affichage par défault : Aujourd'hui, possibilité de changer de jour ou de semaine selon l'affichage)
* Interface de création de cours (Fonctionnalité incomplète/non fonctionelle)
* Affichage des détails d'un cours avec possibilité de le modifier ou de le supprimer (Fonctionnalité incomplète/non fonctionelle)

## Problèmes actuels
* Problèmes à l'insertion d'un nouveau cours, une histoire de persistence corrigée avec "cascade".
* Avec l'ajout du "cascade" une nouvelle erreur est apparue : lors de la création du cours il y'a une tentative de création d'une nouvelle matière alors que l'on souhaite utiliser une matière déjà existante. Incompréhensible...

## Problèmes rencontrés
* Manque de connaissances et de compréhension du fonctionnement de Symfony