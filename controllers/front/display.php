<?php
class moduletestdisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('module:moduletest/views/templates/front/avisHasard.tpl');
    }
}
