<?php
namespace SeleniumSetup\Locker;

class ServerItemFactory
{
    public static function createFromObj(\stdClass $server)
    {
        if (
            !isset($server->name) || 
            !isset($server->pid) ||
            !isset($server->port) ||
            !isset($server->configFilePath)
        ) {
            throw new \Exception('Server instance cannot be created. Missing keys.');
        }
        
        return (new ServerItem())
            ->setName($server->name)
            ->setPid($server->pid)
            ->setPort($server->port)
            ->setConfigFilePath($server->configFilePath)
            ->setDateStarted(date(ServerItem::DATE_FORMAT));
    }
    
    public static function createFromProperties($name, $pid, $port, $configFilePath)
    {
        if (
            empty($name) ||
            empty($pid) ||
            empty($port) ||
            empty($configFilePath)
        ) {
            throw new \Exception('Server instance cannot be created. Missing values.');
        }

        return (new ServerItem())
            ->setName($name)
            ->setPid($pid)
            ->setPort($port)
            ->setConfigFilePath($configFilePath)
            ->setDateStarted(date(ServerItem::DATE_FORMAT));
    }
}