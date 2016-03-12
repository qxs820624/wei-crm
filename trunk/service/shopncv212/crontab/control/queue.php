<?php
/**
 * 队列
*
 * 
 *
 *
 * @网店运维提供技术支持 授权请购买shopnc授权
 * @license    http://www.goodziyuan.com
 * @link       http://www.goodziyuan.com/
*/
defined('ByShopWWI') or exit('Access Invalid!');
ini_set('default_socket_timeout', -1);
class queueControl extends BaseCronControl {

    public function __construct() {}

    public function indexOp() {
        $logic_queue = Logic('queue');
        $model = Model();
        $worker = new QueueServer();
        $queues = $worker->scan();
        while (true) {
            $content = $worker->pop($queues,600);
            if (is_array($content)) {
                $method = key($content);
                $arg = current($content);

                $result = $logic_queue->$method($arg);
                if (!$result['state']) {
                    $this->log($result['msg'],false);
                }
            } else {
                $model->checkActive();
            }
        }
    }
}
