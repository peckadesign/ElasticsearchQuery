<?php declare(strict_types = 1);

namespace Pd\ElasticSearchModule\Model\Document\Body\Mapping;


class Property
{
	public const STORE_YES = 'yes';
	public const STORE_NO = 'no';

	public const STORE = [
		self::STORE_YES,
		self::STORE_NO,
	];

	public const ANALYZER_STANDARD = 'standard';
	public const ANALYZER_KEY_WORD = 'keyword';
	public const ANALYZER_CZECH = 'cestina';
	public const ANALYZER = [
		self::ANALYZER_STANDARD,
		self::ANALYZER_KEY_WORD,
	];

	public const TYPE_STRING = 'string';
	public const TYPE_INTEGER = 'integer';
	public const TYPE_LONG = 'long';
	public const TYPE_DOUBLE = 'double';
	public const TYPE_BOOLEAN = 'boolean';
	public const TYPE_FLOAT = 'float';
	public const TYPE_DATE = 'date';
	public const TYPE = [
		self::TYPE_STRING,
		self::TYPE_DATE,
		self::TYPE_DOUBLE,
		self::TYPE_BOOLEAN,
		self::TYPE_FLOAT,
		self::TYPE_INTEGER,
		self::TYPE_LONG,
	];

	public const INDEX_ANALYZED = 'analyzed';
	public const INDEX_NOT_ANALYZED = 'not_analyzed';
	public const INDEX_NO = 'no';
	public const INDEX = [
		self::INDEX_ANALYZED,
		self::INDEX_NOT_ANALYZED,
		self::INDEX_NO,
	];

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
	private $index;

	/**
	 * @var ?string
	 */
	private $analyzer;

	/**
	 * @var ?string
	 */
	private $store;

	/**
	 * @var \Pd\ElasticSearchModule\Model\Document\Body\Mapping\PropertyCollection
	 */
	private $collection;

	/**
	 * @var null|string
	 */
	private $format;


	public function __construct(
		string $field,
		string $type,
		?string $index,
		?string $analyzer,
		?string $store = 'yes',
		?string $format,
		?\Pd\ElasticSearchModule\Model\Document\Body\Mapping\PropertyCollection $collection
	)
	{
		if ( ! \in_array($type, self::TYPE, TRUE)) {
			throw new \InvalidArgumentException('Not supported type ' . $type);
		}
		if ($store && ! \in_array($store, self::STORE, TRUE)) {
			throw new \InvalidArgumentException('Not supported store ' . $store);
		}

		$this->field = $field;
		$this->type = $type;
		$this->index = $index;
		$this->analyzer = $analyzer;
		$this->store = $store;
		$this->format = $format;
		$this->collection = $collection ?: new \Pd\ElasticSearchModule\Model\Document\Body\Mapping\PropertyCollection();
	}


	public function getField(): string
	{
		return $this->field;
	}


	public function toArray(): array
	{
		$array = [
			$this->field => [
				'type' => $this->type,
			],
		];
		if ($this->store) {
			$array[$this->field]['store'] = $this->store;
		}
		if ($this->index) {
			$array[$this->field]['index'] = $this->index;
		}
		if ($this->analyzer) {
			$array[$this->field]['analyzer'] = $this->analyzer;
		}
		if ($this->format) {
			$array[$this->field]['format'] = $this->format;
		}

		foreach ($this->collection as $property) {
			$array[$this->field]['properties'] = $property->toArray();
		}

		return $array;
	}

}
