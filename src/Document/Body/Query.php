<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\Document;


class Query implements IBody
{

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery
	 */
	private $query;


	public function __construct(
		\Pd\ElasticSearchModule\Model\ElasticQuery $query
	)
	{
		$this->query = $query;
	}


	public function toArray(): array
	{
		return $this->query->toArray();
	}

}
