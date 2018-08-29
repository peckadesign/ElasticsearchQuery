<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


class Range implements IAggregationType
{
	/**
	 * @var string
	 */
	private $fieldName;
	/**
	 * @var bool
	 */
	private $keyed;
	/**
	 * @var RangeValueCollection
	 */
	private $ranges;


	public function __construct(
		string $fieldName,
		bool $keyed = FALSE,
		RangeValueCollection $rangeValueCollection = NULL
	)
	{
		$this->fieldName = $fieldName;
		$this->keyed = $keyed;
		$this->ranges = $rangeValueCollection ?: new RangeValueCollection();
	}


	public function toArray() : array
	{
		$array = [
			'field' => $this->fieldName,
		];

		if ($this->keyed === TRUE) {
			$array['keyed'] = TRUE;
		}

		foreach ($this->ranges as $range) {
			$array['ranges'][] = $range->toArray();
		}

		return [
			'range' => $array,
		];
	}


	public function ranges(): RangeValueCollection
	{
		return $this->ranges;
	}

}
