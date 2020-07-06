<?php
namespace Adianti\Registry;

/**
 * Registry interface
 *
 * @version    5.0
 * @package    registry
 * @author     André Luiz Ferreira
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
interface AdiantiRegistryInterface
{
    public static function enabled();
    public static function setValue($key, $value);
    public static function getValue($key);
    public static function delValue($key);
    public static function clear();
}
