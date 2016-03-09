<?php

use GuzzleHttp\Client;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

require __DIR__ . '/lib/bootstrap.php';

$client = new Client([
	'base_uri' => 'http://cpuboss.com',
	'timeout'  => 2.0
	]);

$response = $client->request('GET', '/');

$responseBody = $response->getBody();

$filesystem = new Filesystem(new Local(__DIR__.'/temp'));

$filesystem->put('cpuboss.txt', $responseBody);