<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore;


class FunctionCollection implements \Pd\ElasticSearchModule\Model\ElasticQuery\ICollection
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\ElasticFunction\IElasticFunction[]
	 */
	private $collection;


	public function __construct(
		\Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\ElasticFunction\IElasticFunction ... $collection
	)
	{
		$this->collection = $collection;
	}


	public function getIterator() : \ArrayIterator
	{
		return new \ArrayIterator($this->collection);
	}


	public function add(
		\Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore\ElasticFunction\IElasticFunction $function
	): void
	{
		$this->collection[] = $function;
	}

}
