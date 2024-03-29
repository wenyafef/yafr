<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/3
 * Time: 11:00 PM
 */

namespace extend;


use Yaf\Controller_Abstract;
use Yaf\Dispatcher;

/**
 * Class Controller
 * @package extend
 * Author: Jiang Haiqiang
 * Email : jhq0113@163.com
 * Date: 2019/1/3
 * Time: 16:14
 */
class ControllerLayout extends Controller_Abstract
{
    /**
     * @var string
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2019/1/3
     * Time: 16:14
     */
    protected $_layout;

    /**
     * @param string $tpl
     * @param array  $parameters
     * @return string
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2019/1/3
     * Time: 16:39
     */
    protected function render($tpl, array $parameters = [])
    {
        Dispatcher::getInstance()->autoRender(false);

        // TODO: Change the autogenerated stub
        $content = parent::render($tpl, $parameters);

        if($parameters['forbidLayout']) {
            return $content;
        }

        $this->_layout = isset($this->_layout) ? $this->_layout : 'layouts/main.phtml';

        return $this->_view->render($this->_layout,[
            'content' => $content
        ]);
    }

    /**
     * @param string $tpl
     * @param array  $parameters
     * @return bool|void
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2019/1/3
     * Time: 16:39
     */
    protected function display($tpl, array $parameters = [])
    {
        $content = $this->render($tpl,$parameters);
        $this->_response->setBody($content);
    }
}