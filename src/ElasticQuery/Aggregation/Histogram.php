<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


class Histogram implements IAggregationType
{
	/**
	 * @var string
	 */
	private $fieldName;
	/**
	 * @var int
	 */
	private $interval;


	public function __construct(
		string $fieldName,
		int $interval
	)
	{
		$this->fieldName = $fieldName;
		$this->interval = $interval;
	}


	public function toArray() : array
	{
		return [
			'histogram' => [
				'field' => $this->fieldName,
				'interval' => $this->interval,
			],
		];
	}

}
