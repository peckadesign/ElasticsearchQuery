<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\Document\Body\Mapping;


class PropertyCollection implements \IteratorAggregate
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\Document\Body\Mapping\Property[]
	 */
	private $collection;


	public function __construct(
		Property ... $collection
	)
	{
		$this->collection = $collection;
	}


	public function getIterator(): \ArrayIterator
	{
		return new \ArrayIterator($this->collection);
	}

	public function add(
		Property $property
	): void
	{
		$this->collection[] = $property;
	}
}
