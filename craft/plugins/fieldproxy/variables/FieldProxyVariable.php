<?php

namespace Craft;

/**
 * FieldProxy Variable
 */
class FieldProxyVariable
{
    static $formCache = [];
    static $formFields = [];

    /**
     * Field
     */
    public function getInputHtml($fieldType, $handle, $value)
    {
        $templatesPath = craft()->path->getSiteTemplatesPath() . '/_formFields';

        $oldTemplatesPath = craft()->path->getSiteTemplatesPath();

        craft()->path->setTemplatesPath($templatesPath);

        $html = $fieldType->getInputHtml($handle, $value);

        craft()->path->setTemplatesPath($oldTemplatesPath);

        return $html;
    }

    public function getField($handle, $formConfigEntry)
    {
        if (!isset(static::$formFields[$formConfigEntry->associatedForm][$handle])) {
            $form = craft()->sections->getSectionByHandle('formSubmissions')->getEntryTypes('handle')[$formConfigEntry->associatedForm];
            $fields = $form->getFieldLayout()->getFields();

            foreach ($fields as $field) {
                static::$formFields[$formConfigEntry->associatedForm][$field->getField()->handle] = $field;
            }
        }

        if (!isset(static::$formFields[$formConfigEntry->associatedForm][$handle])) {
            throw new Exception("Field [" . $handle . "] not found");
        }

        return static::$formFields[$formConfigEntry->associatedForm][$handle];
    }

    public function renderField($handle, $formConfigEntry, $guestEntry)
    {
        $field = $this->getField($handle, $formConfigEntry);

        return craft()->templates->render("_includes/field", [
            'fieldLayoutField' => $this->getField($handle, $formConfigEntry),
            'required' => $this->getField($handle, $formConfigEntry)->required,
        ]);

    }

    //public function renderField($handle, $value, $formConfigEntry)
    //{
    //    if (!isset(static::$formFields[$formConfigEntry->associatedForm][$handle])) {
    //        $form = craft()->sections->getSectionByHandle('formSubmissions')->getEntryTypes('handle')[$formConfigEntry->associatedForm];
    //        $fields = $form->getFieldLayout()->getFields();
    //
    //        foreach ($fields as $field) {
    //            static::$formFields[$formConfigEntry->associatedForm][$field->handle] = $field;
    //        }
    //    }
    //
    //    if (!isset(static::$formFields[$formConfigEntry->associatedForm][$handle])) {
    //        throw new Exception("Field [" . $handle . "] not found");
    //    }
    //
    //    $field = static::$formFields[$formConfigEntry->associatedForm][$handle];
    //
    //    return $this->getInputHtml($field->getFieldType(), $handle, $value);
    //}

}
