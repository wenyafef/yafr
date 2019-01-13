<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/13
 * Time: 1:19 PM
 */

namespace extend\log;

use extend\helpers\StringHelper;
use extend\ILog;

/**
 * Class File
 * @package extend\log
 * User Jiang Haiqiang
 */
class File extends ILog
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $fileName;

    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $mode=0755;

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null|void
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function log($level, $message, array $context = array())
    {
        // TODO: Implement log() method.
        $dir = dirname($this->fileName);

        if(!is_dir($dir)) {
            mkdir($dir,$this->mode,true);
        }

        $message = StringHelper::interpolate($message,$context);

        $file = @fopen($this->fileName,'a');
        if($file) {
            @fwrite($file,$message.PHP_EOL);
            @chmod($this->fileName,$this->mode);
            @fclose($file);
        }
    }
}