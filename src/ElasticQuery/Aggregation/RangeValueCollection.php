<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


class RangeValueCollection implements \Pd\ElasticSearchModule\Model\ElasticQuery\ICollection
{

	/**
	 * @var RangeValue[]
	 */
	private $collection;


	public function __construct(
		RangeValue ... $collection
	)
	{
		$this->collection = $collection;
	}


	public function getIterator() : \ArrayIterator
	{
		return new \ArrayIterator($this->collection);
	}


	public function add(RangeValue $rangeValue): void
	{
		$this->collection[] = $rangeValue;
	}
}
