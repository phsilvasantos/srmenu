<?php
namespace Adianti\Database;

use Adianti\Database\TSqlStatement;

/**
 * Provides an Interface to create DELETE statements
 *
 * @version    5.0
 * @package    database
 * @author     André Luiz Ferreira
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
final class TSqlDelete extends TSqlStatement
{
    protected $sql;
    protected $criteria;    // stores the select criteria
    
    /**
     * Returns a string containing the DELETE plain statement
     * @param $prepared Return a prepared Statement
     */
    public function getInstruction( $prepared = FALSE )
    {
        // creates the DELETE instruction
        $this->sql  = "DELETE FROM {$this->entity}";
        
        // concatenates with the criteria (WHERE)
        if ($this->criteria)
        {
            $expression = $this->criteria->dump( $prepared );
            if ($expression)
            {
                $this->sql .= ' WHERE ' . $expression;
            }
        }
        return $this->sql;
    }
}
