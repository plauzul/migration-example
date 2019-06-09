<?php

namespace src\model;

class UserModel extends \Zend_Db_Table_Abstract
{

    /**
     * The table name.
     *
     * @var string
     */
    protected $_name = 'users';

    /**
     * The primary key column or columns.
     *
     * @var array
     */
    protected $_primary = ['id_user'];
}