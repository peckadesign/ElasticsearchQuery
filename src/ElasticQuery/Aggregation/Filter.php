<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


class Filter extends \Pd\ElasticSearchModule\Model\ElasticQuery\Filter implements IAggregationType
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection
	 */
	private $aggregations;


	public function __construct(
		\Pd\ElasticSearchModule\Model\ElasticQuery\Query\ShouldCollection $should = NULL,
		\Pd\ElasticSearchModule\Model\ElasticQuery\Query\MustCollection $must = NULL,
		\Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection $aggregations = NULL
	)
	{
		parent::__construct($should, $must);
		if ( ! $aggregations) {
			$aggregations = new \Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection();
		}
		$this->aggregations = $aggregations;
	}


	public function aggregations(): \Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection
	{
		return $this->aggregations;
	}


	public function toArray() : array
	{
		$array = parent::toArray();

		if (empty($array)) {
			$array['must'] = [];
		}

		$return = [
			'filter' => [
				'bool' => $array,
			],
		];

		$aggregations = [];
		foreach ($this->aggregations as $aggregation) {
			$aggregations += $aggregation->toArray();
		}
		$return['aggregations'] = $aggregations;

		return $return;
	}

}
