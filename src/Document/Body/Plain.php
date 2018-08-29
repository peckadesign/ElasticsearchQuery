<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\Document;

class Plain implements IBody
{

	/**
	 * @var array
	 */
	private $array;


	public function __construct(
		array $array
	)
	{
		$this->array = $array;
	}


	public function toArray(): array
	{
		return $this->array;
	}
}
