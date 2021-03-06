<?php

/**
 * @author Mohammad Milad Naseri (m.m.naseri at gmail.com)
 * @since 1.0 (12/12/11, 21:54)
 */
//@Entity
class ButtonFormComponent extends FormComponent {

	function __construct() {
		$this->setProperty('type', 'button');
		$this->setProperty('id', uniqid("button-"));
	}

	/**
	 * It will return a set of properties accepted by the component
	 * If it should return null, all properties will be assumed to be acceptable.
	 * @return array
	 */
	function getProperties() {
		$properties = parent::getProperties();
		array_push($properties, 'caption');
		return $properties;
	}

	public function setProperty($property, $value) {
		if ($property == 'disabled') {
			if (boolval($value)) {
				$value = "disabled";
			} else {
				return;
			}
		} else if ($property == 'caption') {
			$this->setProperty('value', $value);
		}
		parent::setProperty($property, $value);
	}

	function getName() {
		return "button";
	}

	function render() {
		$src = "<span class='" . $this->getClassName() . "'>";
		$src .= "<input " . forms_attribute_render($this->properties, FORMS_ATTR_SET . ",type,disabled,value") . " /></span>";
		return $src;
	}

	function getValueAttribute() {
		return "value";
	}
}

?>