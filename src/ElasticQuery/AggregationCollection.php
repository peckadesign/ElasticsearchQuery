<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery;


class AggregationCollection implements ICollection
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation\IAggregationType[]
	 */
	private $collection;


	public function __construct(
		Aggregation ... $collection
	)
	{
		$this->collection = $collection;
	}


	public function getIterator() : \ArrayIterator
	{
		return new \ArrayIterator($this->collection);
	}


	public function add(
		Aggregation $aggregation
	): void
	{
		$this->collection[] = $aggregation;
	}
}
