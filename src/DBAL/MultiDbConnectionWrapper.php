<?php

declare(strict_types=1);

namespace App\DBAL;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;

final class MultiDbConnectionWrapper extends Connection
{
	public function __construct(
		array $params,
		Driver $driver,
		?Configuration $config = null,
		?EventManager $eventManager = null
	) {
		parent::__construct($params, $driver, $config, $eventManager);
	}

	public function selectDatabase(string $dbName): void
	{
		if ($this->isConnected()) {
			$this->close();
		}

		$params = $this->getParams();
		$params['dbname'] = $dbName;
		parent::__construct($params, $this->_driver, $this->_config, $this->_eventManager);
	}
}
