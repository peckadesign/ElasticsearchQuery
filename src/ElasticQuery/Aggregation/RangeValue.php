<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


class RangeValue
{
	/**
	 * @var string
	 */
	private $key;
	/**
	 * @var int
	 */
	private $from;
	/**
	 * @var int
	 */
	private $to;


	public function __construct(
		string $key,
		int $from,
		int $to
	)
	{
		$this->key = $key;
		$this->from = $from;
		$this->to = $to;
	}


	public function toArray() : array
	{
		return [
			'key' => $this->key,
			'from' => $this->from,
			'to' => $this->to,
		];
	}
}
