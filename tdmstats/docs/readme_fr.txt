************************************************************
TDM : TDMStats
Version 1.00 | 21-07-2009
Dev:  2.2.3
************************************************************

************************************************************
MISE A JOUR
************************************************************

- Ecraser le dossier TDMStats, mettre � jour le module depuis l'administration du site.
- En cas d'utilisation d'un jeu de templates personnalis�, supprimer les templates du module pour les reg�n�rer.
- Utiliser l'onglet admin/plugin pour la copie du plugin ou reporter vous a la section "copie manuelle"
- Rendez-vous dans l'administration du module pour cr�er les permissions.


************************************************************
Installation
************************************************************

- Uploader tout le dossier 'TDMStats' dans le dossier RACINE_DE_VOTRE_SITE/modules/
- Aller dans l�admininistration de votre site pour installer le module.
- Aller dans l'admininistration du module, puis utiliser l'onglet 'Plugin' pour copier le plugin ou reporter vous a la section "copie manuelle".
- Rendez-vous dans l'administration du module pour cr�er les permissions.



************************************************************
Copier manuellement les fichiers contenus dans le dossier "xoops_plugins"
************************************************************

respecter la structure des dossiers et sous-dossiers

function.xoStats.php (nouveau fichier)

Copier le fichier TDMStats/xoops_plugins/function.xoStats.php
Dans RACINE_DE_VOTRE_SITE/class/smarty/xoops_plugins/

************************************************************
SMARTY TDMStats
************************************************************

1) <{xoStats}> (compte les visites)

Note: Penser à copier le code "<{xoStats}>" dans le fichier theme.html de votre thème en cours afin de comptabiliser les visites...