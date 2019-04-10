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
                'width' => 140,
                'type' => 'int',
            ),
            'avis' => array(
                'title' => $this->l('titre'),
                'width' => 140,
                'type' => 'text',
            ),
        );

        $helper = new HelperList();

        $helper->shopLinkType = '';

        $helper->actions = array('edit', 'delete', 'view');

        $helper->identifier = 'id_avis';
        $helper->show_toolbar = true;
        $helper->title = 'HelperList';
        $helper->table =_DB_PREFIX_.$this->name;

        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        $results = array(array('id_avis' => 1,'avis' => 'nan cest cool')); //Remplacer par appel sur la base de donnée

        return $helper->generateList($results,$fields_list);
    }


    public function hookDisplayHome(array $params)
    {

    }

}