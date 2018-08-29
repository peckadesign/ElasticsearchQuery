<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Query;


class ShouldCollection implements \Pd\ElasticSearchModule\Model\ElasticQuery\ICollection
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\Query\ILeafQuery[]
	 */
	private $collection;


	public function __construct(
		\Pd\ElasticSearchModule\Model\ElasticQuery\Query\ILeafQuery ... $collection
	)
	{
		$this->collection = $collection;
	}


	public function getIterator() : \ArrayIterator
	{
		return new \ArrayIterator($this->collection);
	}


	public function add(ILeafQuery $should): void
	{
		$this->collection[] = $should;
	}

}
