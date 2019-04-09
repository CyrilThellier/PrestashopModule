<?php

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    public function demoAction()
    {
        return $this->render('@Modules/moduletest/templates/admin/demo.html.twig');
    }
}
