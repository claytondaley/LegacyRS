<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 1/4/2015
 * Time: 5:28 PM
 */

namespace LegacyRS\Event;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventInterface;

class LoginListener implements ListenerAggregateInterface
{
    protected $listeners = array();

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(array('ZfcUser\Authentication\Adapter\Db', 'authenticate'), array($this, 'setupSession'));
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    public function setupSession(EventInterface $event)
    {
        // Login logic goes here
        echo 'param id  = '.$event->getParam('id');
        die();
    }
}