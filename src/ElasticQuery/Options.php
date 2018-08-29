<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery;


class Options
{

	public const DATETIME_FORMAT = 'Y-m-d H:i:s';

	/**
	 * @var ?int
	 */
	private $size;
	/**
	 * @var ?int
	 */
	private $from;
	/**
	 * @var SortCollection
	 */
	private $sort;
	/**
	 * @var ?float
	 */
	private $minScore;


	public function __construct(
		?int $size = NULL,
		?int $from = NULL,
		?SortCollection $sort = NULL,
		?float $minScore = NULL
	)
	{
		$this->size = $size;
		$this->from = $from;
		$this->sort = $sort ?: new SortCollection();
		$this->minScore = $minScore;
	}


	public function toArray() : array
	{
		$array = [];

		if ($this->from !== NULL) {
			$array['from'] = $this->from;
		}

		if ($this->size !== NULL) {
			$array['size'] = $this->size;
		}

		foreach ($this->sort as $item) {
			$array['sort'][] = $item->toArray();
		}

		if ($this->minScore) {
			$array['min_score'] = $this->minScore;
		}

		return $array;
	}


	public function sort() : SortCollection
	{
		return $this->sort;
	}
}
