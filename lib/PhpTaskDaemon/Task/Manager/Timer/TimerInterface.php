<?php
/**
 * @package PhpTaskDaemon
 * @subpackage Task\Manager\Timer
 * @copyright Copyright (C) 2011 Dirk Engels Websolutions. All rights reserved.
 * @author Dirk Engels <d.engels@dirkengels.com>
 * @license https://github.com/DirkEngels/PhpTaskDaemon/blob/master/doc/LICENSE
 */

namespace PhpTaskDaemon\Task\Manager\Timer;

interface TimerInterface {

    public function timeToWait();

}