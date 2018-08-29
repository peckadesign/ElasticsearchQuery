<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Query;


class Terms implements ILeafQuery
{

	/**
	 * @var string
	 */
	private $field;

	/**
	 * @var array
	 */
	private $query;

	/**
	 * @var float
	 */
	private $boost;


	public function __construct(
		string $field,
		array $query,
		float $boost = 1.0
	)
	{
		$this->field = $field;
		$this->query = $query;
		$this->boost = $boost;
	}


	public function toArray() : array
	{
		$array = [
			'terms' => [
				$this->field => $this->query,
				'boost' => $this->boost,
			],
		];

		return $array;
	}

}
