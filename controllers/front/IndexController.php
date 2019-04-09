<?php
class IndexController extends ModuleFrontController
{
    public function initContent()
    {
        $this->context->smarty->assign(
            array(
                'id_avis'=>Tools::getValue('id_avis'),
                'titre'=>Tools::getValue('titre'),
                'contenu'=>Tools::getValue('contenu'),
                'date_ajout'=>Tools::getValue('date_ajout'),
                'actions'
            )
        );
    }
}