<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model;


class ElasticQuery
{
	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\QueryCollection
	 */
	private $query;

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\FilterCollection
	 */
	private $filter;

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection
	 */
	private $aggregations;

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\Options
	 */
	private $options;

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\Highlight|NULL
	 */
	private $highlight;

	/**
	 * @var \Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore|NULL
	 */
	private $functionScore;


	public function __construct(
		\Pd\ElasticSearchModule\Model\ElasticQuery\Options $options,
		?\Pd\ElasticSearchModule\Model\ElasticQuery\QueryCollection $query = NULL,
		?\Pd\ElasticSearchModule\Model\ElasticQuery\FilterCollection $filter = NULL,
		?\Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection $aggregations = NULL,
		?\Pd\ElasticSearchModule\Model\ElasticQuery\Highlight $highlight = NULL,
		?\Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore $functionScore = NULL
	)
	{
		$this->query = $query ?: new \Pd\ElasticSearchModule\Model\ElasticQuery\QueryCollection();
		$this->filter = $filter ?: new \Pd\ElasticSearchModule\Model\ElasticQuery\FilterCollection();
		$this->aggregations = $aggregations ?: new \Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection();
		$this->options = $options;
		$this->highlight = $highlight;
		$this->functionScore = $functionScore;
	}


	public function toArray() : array
	{
		$array = $this->options->toArray();

		$array['query']['bool']['must'] = [];
		$array['query']['bool']['should'] = [];
		foreach ($this->query as $query) {
			$queryArray = $query->toArray();
			if (isset($queryArray['must'])) {
				foreach ($queryArray['must'] as $must) {
					$array['query']['bool']['must'][] = $must;
				}
			}

			if (isset($queryArray['should'])) {
				foreach ($queryArray['should'] as $should) {
					$array['query']['bool']['should'][] = $should;
				}
			}
		}

		$array['filter']['bool']['must'] = [];
		$array['filter']['bool']['should'] = [];
		foreach ($this->filter as $filter) {
			$filterArray = $filter->toArray();
			if (isset($filterArray['must'])) {
				foreach ($filterArray['must'] as $must) {
					$array['filter']['bool']['must'][] = $must;
				}
			}

			if (isset($filterArray['should'])) {
				foreach ($filterArray['should'] as $should) {
					$array['filter']['bool']['should'][] = $should;
				}
			}
		}

		foreach ($this->aggregations as $aggregation) {
			if (empty($array['aggregations'])) {
				$array['aggregations'] = [];
			}
			$array['aggregations'] = \array_merge($array['aggregations'], $aggregation->toArray());
		}

		if ($this->highlight) {
			$array['highlight'] = $this->highlight->toArray();
		}

		if ( ! empty($this->functionScore)) {
			$array['query'] = $this->functionScore->toArray($array['query']);
		}

		return $array;
	}


	public function query() : \Pd\ElasticSearchModule\Model\ElasticQuery\QueryCollection
	{
		return $this->query;
	}


	public function filter() : \Pd\ElasticSearchModule\Model\ElasticQuery\FilterCollection
	{
		return $this->filter;
	}


	public function aggregations() : \Pd\ElasticSearchModule\Model\ElasticQuery\AggregationCollection
	{
		return $this->aggregations;
	}


	public function setHighlight(\Pd\ElasticSearchModule\Model\ElasticQuery\Highlight $highlight): void
	{
		$this->highlight = $highlight;
	}


	public function setFunctionScore(\Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore $functionScore): void
	{
		$this->functionScore = $functionScore;
	}


	public function functionScore(): ?\Pd\ElasticSearchModule\Model\ElasticQuery\FunctionScore
	{
		return $this->functionScore;
	}

}
