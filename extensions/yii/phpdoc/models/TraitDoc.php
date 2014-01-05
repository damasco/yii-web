<?php
/**
 * 
 * 
 * @author Carsten Brandt <mail@cebe.cc>
 */

namespace yii\phpdoc\models;

class TraitDoc extends BaseDoc
{
	// classes using the trait
	public $usedByClasses = [];

	public $traits = [];

	public $properties = [];
	public $methods = [];


	/**
	 * @param \phpDocumentor\Reflection\TraitReflector $reflector
	 * @param Context $context
	 * @param array $config
	 */
	public function __construct($reflector, $context = null, $config = [])
	{
		// base properties
		$this->name = ltrim($reflector->getName(), '\\');
		$this->startLine = $reflector->getNode()->getAttribute('startLine');
		$this->endLine = $reflector->getNode()->getAttribute('endLine');

		foreach($reflector->getTraits() as $trait) {
			$this->traits[] = ltrim($trait, '\\');
		}

		// TODO methods

		// TODO properties

		// TODO docblock

		if ($context !== null) {
			$context->addTrait($this);
		}

		parent::__construct($config);
	}
}