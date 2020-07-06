<?php
/**
 * PublicView
 *
 * @version    1.0
 * @package    control
 * @subpackage public
 * @author     André Luiz Ferreira
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PublicView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $html = new THtmlRenderer('app/resources/public.html');

        // replace the main section variables
        $html->enableSection('main', array());
        
        $panel = new TPanelGroup('Public!');
        $panel->add($html);
        $panel->style = 'margin: 100px';
        
        // add the template to the page
        parent::add( $panel );
    }
}
