<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.2.0
 */

use \FFQP\Quotation as Quotation;

/**
 * Used to retrieve quotations and soccer player information from an *.xls file
 * that is provided by the Gazzetta dello Sport.
 * 
 * @see <http://magic.gazzetta.it>
 */
class GazzettaQuotationsParser extends AbstractQuotationsParser {

  /**
   * Indicates the max limit of row where the first cell can appear.
   * So the first available cell is at most at that row.
   * @var integer
   * @default 4
   */
  const MAX_FIRST_CELL_ROW = 4;

  /**
   * @inheritdoc
   */
  public function getQuotations($isNormalizingEnabled = false) {
    $quotations = array();

    // Look for first available row
    $cellFound = false;
    $firstCellRowIndex = 1;

    while ($firstCellRowIndex <= self::MAX_FIRST_CELL_ROW && !$cellFound && $firstCellRowIndex <= $this->_reader->rowcount()) {
      if (intval(($this->_reader->val($firstCellRowIndex, 1)))) {
        $cellFound = true;
        break;
      }
      $firstCellRowIndex++;
    }

    if ($cellFound) {
      for ($i = $firstCellRowIndex; $i <= $this->_reader->rowcount(); $i++) {
        $config = array();
        foreach ($this->getFields() as $index => $field) {
          $config[$field] = $this->_reader->val($i, $index + 1);
        }
        $quotation = new Quotation($config);
        $quotationToArray = $quotation->toArray($this->getFields());
        $quotations[$quotation->getCode()] = $isNormalizingEnabled ? $this->_normalizer->normalize($quotationToArray) : $quotationToArray;
      }
    }

    return $quotations;
  }

  /**
   * @inheritdoc
   */
  public function getMatchDayNumber() {
    // The first cell contains the information of the day of the match.
    $header = $this->_reader->val(1, 1);
    $matchNumberPosition = strpos($header, 'N.');
    if ($matchNumberPosition === false) {
      return null;
    }

    return substr($header, $matchNumberPosition + 2);
  }

  /**
   * @inheritdoc
   */
  public function getNewspaper() {
    return 'La Gazzetta dello Sport';
  }
}
