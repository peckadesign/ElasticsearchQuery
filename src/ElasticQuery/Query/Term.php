<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Query;


class Term implements ILeafQuery
{

	/**
	 * @var string
	 */
	private $field;
	/**
	 * @var string
	 */
	private $query;
	/**
	 * @var float
	 */
	private $boost;


	public function __construct(
		string $field,
		$query,
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
			'term' => [
				$this->field => [
					'value' => $this->query,
					'boost' => $this->boost,
				],
			],
		];

		return $array;
	}

}
