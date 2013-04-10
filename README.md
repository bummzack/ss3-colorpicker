ss3-colorpicker
===============

Colorpicker module for SilverStripe 3.0.
Uses the jQuery minicolors plugin: https://github.com/claviska/jquery-miniColors

Usage
-------------

Here's how you define a DB field to be a color:

    private static $db = array(
        'MyColor' => 'Color'
    );
    
That's all... scaffolding will take care of creating the appropriate form-field.

If you use `getCMSFields` to create your fields yourself, you might want to do something like this:

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new ColorField('MyColor'), 'Content');
    
        return $fields;
    }