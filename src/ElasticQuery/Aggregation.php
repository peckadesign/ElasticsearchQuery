<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery;


class Aggregation implements IAggregation
{
	/**
	 * @var string
	 */
	private $name;
	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation\IAggregationType
	 */
	private $aggregationType;
	/**
	 * @var AggregationCollection
	 */
	private $aggregations;


	public function __construct(
		string $name
		, \Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation\IAggregationType $aggregationType
		, ?AggregationCollection $aggregationCollection = NULL
	)
	{
		$this->name = $name;
		$this->aggregationType = $aggregationType;
		$this->aggregations = $aggregationCollection ?: new AggregationCollection();
	}


	public function toArray(): array
	{
		$array = [
			$this->name => $this->aggregationType->toArray(),
		];

		$aggregations = [];
		foreach ($this->aggregations as $aggregation) {
			$aggregations = $aggregations + $aggregation->toArray();
		}

		if ( ! empty($aggregations)) {
			$array[$this->name]['aggregations'] = $aggregations;
		}

		return $array;
	}


	public function aggregations() : AggregationCollection
	{
		return $this->aggregations;
	}
}
