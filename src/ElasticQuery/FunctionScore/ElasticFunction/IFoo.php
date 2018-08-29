<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\ElasticFunction;


interface IElasticFunction
{
	public function toArray(): array;
}
