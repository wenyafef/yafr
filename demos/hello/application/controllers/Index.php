<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:35 PM
 */
class IndexController extends Yaf\Controller_Abstract
{
    // default action name
    public function indexAction()
    {
        echo YAF_VERSION;
        echo YAF_ENVIRON;
        die;

        $service = new \service\BaseService('dbName');

        $this->getView()->content = $service->db;
    }
}