<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery;


class Sort
{
	/**
	 * @var string
	 */
	private $field;
	/**
	 * @var string
	 */
	private $type;
	/**
	 * @var ?string
	 */
	private $missing;


	public function __construct(
		string $field,
		string $type,
		?string $missing = '_last'
	)
	{

		$this->field = $field;
		$this->type = $type;
		$this->missing = $missing;
	}


	public function toArray() : array
	{
		$array = [
			$this->field => [
				'order' => $this->type,
			],
		];

		if ($this->missing !== NULL) {
			$array[$this->field]['missing'] = $this->missing;
		}

		return $array;
	}
}
