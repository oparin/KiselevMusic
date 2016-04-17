<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 2/15/15
 * Time: 2:43 PM
 */

namespace KiselevMusic\AdminBundle\Grid\Column;

use APY\DataGridBundle\Grid\Column\Column;

/**
 * Class PhotoColumn
 * @package KiselevMusic\AdminBundle\Grid\Column
 */
class PhotoColumn extends Column
{
    /**
     * @param array $params
     */
    public function __initialize(array $params)
    {
        parent::__initialize($params);

        // Disable the filter of the column
        $this->setFilterable(false);
        $this->setOrder(false);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'photo';
    }
}