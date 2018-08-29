<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


interface IAggregationType
{
	public function toArray() : array;
}
