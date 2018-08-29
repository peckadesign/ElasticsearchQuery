<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Query;

interface ILeafQuery
{

	public function toArray(): array;
}
