<?php
/**
 * SystemProfileView
 *
 * @version    1.0
 * @package    control
 * @subpackage admin
 * @author     André Luiz Ferreira
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SystemProfileView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $html = new THtmlRenderer('app/resources/system_profile.html');
        $replaces = array();
        
        try
        {
            TTransaction::open('permission');
            
            $user= SystemUser::newFromLogin(TSession::getValue('login'));
            $replaces = $user->toArray();
            $replaces['frontpage'] = $user->frontpage_name;
            $replaces['groupnames'] = $user->getSystemUserGroupNames();
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        $html->enableSection('main', $replaces);
        $html->enableTranslation();
        
        $container = TVBox::pack($html);
        $container->style = 'width:80%';
        parent::add($container);
    }
}
