<?php

namespace src\model;

class NoticiaModel extends \Zend_Db_Table_Abstract
{

    /**
     * The table name.
     *
     * @var string
     */
    protected $_name = 'news';

    /**
     * The primary key column or columns.
     *
     * @var array
     */
    protected $_primary = ['id_new'];
}