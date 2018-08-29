<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\ElasticFunction;

final class Weight implements IElasticFunction
{

	/**
	 * @var float
	 */
	private $weight;

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\Query\ILeafQuery
	 */
	private $leafQuery;


	public function __construct(
		float $weight,
		\Pd\ElasticSearchModule\Model\ElasticQuery\Query\ILeafQuery $leafQuery
	) {
		$this->weight = $weight;
		$this->leafQuery = $leafQuery;
	}


	public function toArray(): array
	{
		return [
			'weight' => $this->weight,
			'filter' => $this->leafQuery->toArray(),
		];
	}
}
