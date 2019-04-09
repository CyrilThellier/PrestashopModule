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
            !$this.registerHook('displayHome') ||
        ) {
            return false;
        }

        return true;
    }
}