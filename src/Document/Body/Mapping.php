<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\Document\Body;


class Mapping implements \Pd\ElasticSearchModule\Model\Document\IBody
{
	/**
	 * @var \Pd\ElasticSearchModule\Model\Document\Body\Mapping\PropertyCollection
	 */
	private $properties;


	public function __construct(
		\Pd\ElasticSearchModule\Model\Document\Body\Mapping\PropertyCollection $properties
	)
	{
		$this->properties = $properties;
	}


	public function toArray(): array
	{
		$array['properties'] = [];

		foreach ($this->properties as $property) {
			$array['properties'] += $property->toArray();
		}

		return $array;
	}
}
