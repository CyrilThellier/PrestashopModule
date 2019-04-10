<?php

class Sample extends ObjectModel
{

    public $id_avis;
    public $titre;
    public $contenu;
    public $date_ajout;
    public $date_update;

    public static $definition = [
        'table' => 'ps_avis',
        'primary' => 'id_avis',
        'multilang' => true,
        'fields' => [
            'titre' => ['type' => self::TYPE_STRING, 'validate' => 'isTitre', 'size' => 255, 'required' => true],
            'contenu' => ['type' => self::TYPE_STRING, 'validate' => 'isContenu', 'size' => 2000, 'required' => true],
            'date_ajout' => ['type' => self::TYPE_TIMESTAMP, 'validate' => 'isDateAjout', 'size' => 255, 'required' => true],
            'date_update' => ['type' => self::TYPE_TIMESTAMP, 'validate' => 'isDateUpdate', 'size' => 255, 'required' => true],

        ],
    ];
}