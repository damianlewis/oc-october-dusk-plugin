<?php

namespace DamianLewis\OctoberTesting\Concerns;

trait MakesOctoberAssertions
{
    /**
     * Assert that the text field with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertTextFieldVisible($name)
    {
        return $this->assertVisible($this->getFormFieldSelector($name, 'text'));
    }

    /**
     * Assert that the text field with the given name is not on the page.
     *
     * @param string $name
     * @return $this
     */
    public function assertTextFieldMissing($name)
    {
        return $this->assertMissing($this->getFormFieldSelector($name, 'text'));
    }

    /**
     * Assert that the text field with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertTextAreaFieldVisible($name)
    {
        return $this->assertVisible($this->getFormFieldSelector($name, 'textarea'));
    }

    /**
     * Assert that the balloon selector field with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertBalloonSelectorFieldVisible($name)
    {
        return $this->assertVisible($this->getFormFieldSelector($name, 'balloon-selector'));
    }

    /**
     * Assert that the date picker form widget with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertDatePickerWidgetVisible($name)
    {
        return $this->assertVisible($this->getFormWidgetSelector($name, 'datepicker'));
    }

    /**
     * Assert that the drop down form widget with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertDropDownWidgetVisible($name)
    {
        return $this->assertVisible($this->getFormWidgetSelector($name, 'dropdown'));
    }

    /**
     * Assert that the file upload form widget with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertFileUploadWidgetVisible($name)
    {
        return $this->assertVisible($this->getFormWidgetSelector($name, 'fileupload'));
    }

    /**
     * Assert that the media finder form widget with the given name is visible.
     *
     * @param string $name
     * @return $this
     */
    public function assertMediaFinderWidgetVisible($name)
    {
        return $this->assertVisible($this->getFormWidgetSelector($name, 'mediafinder'));
    }

    /**
     * Get the css selector for a form field.
     *
     * @param string $name
     * @param string $fieldType
     * @return string
     */
    protected function getFormFieldSelector($name, $fieldType)
    {
        return ".${fieldType}-field[data-field-name='${name}']";
    }

    /**
     * Get the css selector for a form widget.
     *
     * @param $name
     * @param $fieldType
     * @return string
     */
    public function getFormWidgetSelector($name, $fieldType)
    {
        switch ($fieldType) {
            case 'datatable':
                $selector = "[data-field-name='${name}'] [data-control='table']";
                break;
            case 'markdown':
                $selector = "[data-field-name='${name}'] [data-control='${fieldType}editor']";
                break;
            case 'relation':
                $selector = "[data-field-name='${name}'] .${fieldType}-widget";
                break;
            case 'repeater':
                $selector = "[data-field-name='${name}'] [data-control='field${fieldType}']";
                break;
            case 'taglist':
                $selector = "[data-field-name='${name}'] .form-control.custom-select.select-hide-selected";
                break;
            default:
                $selector = "[data-field-name='${name}'] [data-control='${fieldType}']";
        }

        return $selector;
    }
}
