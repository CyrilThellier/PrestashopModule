<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class ModuleTest extends Module{
    public function __construct()
    {
        $this->name = 'moduletest';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Cyril Thellier';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Module pour le Test');
        $this->description = $this->l('Le module a faire pour la candidature de stage chez prestarocket');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('MYMODULE_NAME', 'my friend')
        ) {
            return false;
        }

        return true;
    }


    public function uninstall()
    {
        if (!parent::uninstall() ||
            !Configuration::deleteByName('MYMODULE_NAME')
        ) {
            return false;
        }

        return true;
    }

    public function getContent()
    {
        return $this->displayList();
    }

    public function displayList()
    {

        $fields_list = array(
            'id_avis' => array(
                'title' => $this->l('id_avis'),
                'width' => 70,
                'type' => 'int',
            ),
            'titre' => array(
                'title' => $this->l('titre'),
                'width' => 70,
                'type' => 'text',
            ),
            'contenu' => array(
                'title' => $this->l('contenu'),
                'width' => 70,
                'type' => 'text',
            ),
            'date_ajout' => array(
                'title' => $this->l('date_ajout'),
                'width' => 70,
                'type' => date("Y/m/d"),
            ),
        );

        $helper = new HelperList();

        $helper->shopLinkType = '';

        $helper->actions = array('view', 'edit', 'delete');

        $helper->identifier = 'id_avis';
        $helper->show_toolbar = true;
        $helper->title = 'HelperList';
        $helper->table =_DB_PREFIX_.$this->name;

        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        $query = 'SELECT id_avis, titre, contenu, date_ajout FROM ps_avis';

        $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

        return $helper->generateList($results,$fields_list);
    }


    public function hookDisplayHome(array $params)
    {

    }

}