<?php
namespace Adianti\Widget\Form;

use Adianti\Widget\Form\TMultiSearch;
use Adianti\Widget\Form\AdiantiWidgetInterface;

/**
 * Unique Search Widget
 *
 * @version    5.0
 * @package    widget
 * @subpackage form
 * @author     André Luiz Ferreira
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TUniqueSearch extends TMultiSearch implements AdiantiWidgetInterface
{
    /**
     * Class Constructor
     * @param  $name Widget's name
     */
    public function __construct($name)
    {
        // executes the parent class constructor
        parent::__construct($name);
        parent::setMaxSize(1);
        parent::setDefaultOption(TRUE);
        parent::disableMultiple();
        
        $this->tag->{'name'}  = $this->name;    // tag name
        $this->tag->{'widget'} = 'tuniquesearch';
    }
    
    /**
     * Set value
     */
    public function setValue($value)
    {
        $this->value = $value; // avoid use parent::setValue() because compat mode
    }
    
    /**
     * Return the post data
     */
    public function getPostData()
    {
        if (isset($_POST[$this->name]))
        {
            $val = $_POST[$this->name];
            return $val;
        }
        else
        {
            return '';
        }
    }
}
