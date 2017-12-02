<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\RowData;

/**
 * Normalizes the "team" value
 */
class TeamNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RowData $rowData, $format = null): string
    {
        return (string)$value;
    }
}