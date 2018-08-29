<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\ElasticQuery\Query;


class Match implements ILeafQuery
{

	/**
	 * @var string
	 */
	private $field;
	/**
	 * @var string
	 */
	private $queryString;
	/**
	 * @var float
	 */
	private $boost;
	/**
	 * @var int
	 */
	private $slop;
	/**
	 * @var string
	 */
	private $fuzziness;

	/**
	 * @var ?string
	 */
	private $type;

	/**
	 * @var null|string
	 */
	private $minimumShouldMatch;

	/**
	 * @var null|string
	 */
	private $operator;


	public function __construct(
		string $field,
		string $queryString,
		float $boost = 1.0,
		int $slop = 1,
		string $fuzziness = '',
		?string $type = NULL,
		?string $minimumShouldMatch = NULL,
		?string $operator = NULL
	)
	{
		$this->field = $field;
		$this->queryString = $queryString;
		$this->boost = $boost;
		$this->slop = $slop;
		$this->fuzziness = $fuzziness;
		$this->type = $type;
		$this->minimumShouldMatch = $minimumShouldMatch;
		$this->operator = $operator;
	}


	public function toArray() : array
	{
		$array = [
			'match' => [
				$this->field => [
					'query' => $this->queryString,
					'boost' => $this->boost,
					'slop'	=> $this->slop,
				],
			],
		];

		if ($this->type) {
			$array['match'][$this->field]['type'] = $this->type;
		}

		if ($this->fuzziness) {
			$array['match'][$this->field]['fuzziness'] = $this->fuzziness;
		}

		if ($this->minimumShouldMatch) {
			$array['match'][$this->field]['minimum_should_match'] = $this->minimumShouldMatch;
		}

		if ($this->operator) {
			$array['match'][$this->field]['operator'] = $this->operator;
		}

		return $array;
	}

}
