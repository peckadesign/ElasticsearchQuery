<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Query;


class Range implements \Pd\ElasticSearchModule\Model\ElasticQuery\Query\ILeafQuery
{

	/**
	 * @var string
	 */
	private $field;

	/**
	 * @var int
	 */
	private $boost;

	/**
	 * @var int|\DateTimeInterface|NULL
	 */
	private $gte;

	/**
	 * @var int|\DateTimeInterface|NULL
	 */
	private $lte;


	public function __construct(
		string $field,
		$gte = NULL,
		$lte = NULL,
		int $boost = 1
	)
	{
		if ($gte === NULL && $lte === NULL) {
			throw new \InvalidArgumentException('Range must have at least one border value.');
		}
		if ($lte && $gte && $lte < $gte) {
			throw new \InvalidArgumentException('Input values does not make range. From: ' . $gte . ' To: ' . $lte);
		}

		$this->field = $field;
		$this->boost = $boost;
		$this->gte = $gte;
		$this->lte = $lte;
	}


	public function toArray() : array
	{
		$array = [
			'range' => [
				$this->field => [
					'boost' => $this->boost,
				],
			],
		];

		if ($this->gte !== NULL) {
			$array['range'][$this->field]['gte'] =
				$this->gte instanceof \DateTimeInterface ?
					$this->gte->format(\Pd\ElasticSearchModule\Model\ElasticQuery\Options::DATETIME_FORMAT)
					: $this->gte;
		}

		if ($this->lte !== NULL) {
			$array['range'][$this->field]['lte'] =
				$this->lte instanceof \DateTimeInterface ?
					$this->lte->format(\Pd\ElasticSearchModule\Model\ElasticQuery\Options::DATETIME_FORMAT)
					: $this->gte;
		}

		return $array;
	}

}
