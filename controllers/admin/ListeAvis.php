<?php
require_once _PS_MODULE_DIR_ . '/moduletest/classes/Avis.php';

class ListeAvisController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true; //Gestion de l'affichage en mode bootstrap
        $this->table = Sample::$definition['table']; //Table de l'objet
        $this->identifier = Sample::$definition['primary']; //Clé primaire de l'objet
        $this->className = Sample::class; //Classe de l'objet
        $this->lang = true; //Flag pour dire si utilisation de langues ou non

        //Appel de la fonction parente pour pouvoir utiliser la traduction ensuite
        parent::__construct();

        //Liste des champs de l'objet à afficher dans la liste
        $this->fields_list = [
            'id_avis' => [ //nom du champ sql
                'title' => $this->module->l('ID'), //Titre
                'align' => 'center', // Alignement
                'class' => 'fixed-width-xs' //classe css de l'élément
            ],
            'titre' => [
                'title' => $this->module->l('titre'),
                'align' => 'left',
            ],
            'contenu' => [
                'title' => $this->module->l('contenu'),
                'align' => 'left',
            ],
            'date_ajout' => [
                'title' => $this->module->l('date_ajout'),
                'align' => 'left',
            ],
            'date_update' => [
                'title' => $this->module->l('date_update'),
                'align' => 'left',
            ]
        ];

        //Ajout d'actions sur chaque ligne
        $this->addRowAction('view','edit','delete');
    }
}