<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

$configurator->setDebugMode('192.168.1.0'); // enable for your remote IP
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

if(file_exists(__DIR__ . '/config/config.neon') === FALSE){
    throw new \Nette\FileNotFoundException("Požadovaný súbor config.neon nebol nájdený");
}
$configurator->addConfig(__DIR__ . '/config/config.neon');

if(file_exists(__DIR__ . '/config/config.local.neon') === FALSE){
    throw new \Nette\FileNotFoundException("Požadovaný súbor config.local.neon nebol nájdený");
}
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;
