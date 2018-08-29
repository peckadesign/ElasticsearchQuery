<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Aggregation;


class Terms implements IAggregationType
{
	/**
	 * @var string
	 */
	private $fieldName;
	/**
	 * @var int
	 */
	private $size;
	/**
	 * @var ?int
	 */
	private $missing;


	public function __construct(
		string $fieldName,
		int $size = 0,
		?int $missing = NULL
	)
	{
		$this->fieldName = $fieldName;
		$this->size = $size;
		$this->missing = $missing;
	}


	public function toArray() : array
	{
		$array = [
			'field' => $this->fieldName,
			'size' => $this->size,
		];

		if ($this->missing !== NULL) {
			$array['missing'] = $this->missing;
		}

		return [
			'terms' => $array,
		];
	}

}
