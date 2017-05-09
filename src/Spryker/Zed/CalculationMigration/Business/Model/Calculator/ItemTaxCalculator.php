<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CalculationMigration\Business\Model\Calculator;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Tax\Business\TaxFacadeInterface;

class ItemTaxCalculator implements CalculatorInterface
{

    /**
     * @var \Spryker\Zed\Tax\Business\TaxFacadeInterface
     */
    protected $accruedTaxCalculator;

    /**
     * @param \Spryker\Zed\Tax\Business\TaxFacadeInterface $taxFacadeInterface
     */
    public function __construct(TaxFacadeInterface $taxFacadeInterface)
    {
        $this->accruedTaxCalculator = $taxFacadeInterface;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculate(QuoteTransfer $quoteTransfer)
    {
        $this->accruedTaxCalculator->resetAccruedTaxCalculatorRoundingErrorDelta();

        foreach ($quoteTransfer->getItems() as $itemTransfer) {

            $itemTransfer->setUnitTaxAmount(0);
            $itemTransfer->setSumTaxAmount(0);

            if (!$itemTransfer->getTaxRate()) {
                continue;
            }

            $unitTaxAmount = $this->calculateTaxAmount(
                $itemTransfer->getUnitGrossPrice(),
                $itemTransfer->getTaxRate()
            );

            $sumTaxAmount = $this->calculateTaxAmount(
                $itemTransfer->getSumGrossPrice(),
                $itemTransfer->getTaxRate()
            );

            $itemTransfer->setUnitTaxAmount((int)round($unitTaxAmount));
            $itemTransfer->setSumTaxAmount((int)round($sumTaxAmount));

            $itemTransfer->setUnitTaxAmount((int)round($itemTransfer->getUnitTaxAmount()));
            $itemTransfer->setSumTaxAmount((int)round($itemTransfer->getSumTaxAmount()));
        }
    }

    /**
     * @param int $price
     * @param float $taxRate
     *
     * @return float
     */
    protected function calculateTaxAmount($price, $taxRate)
    {
        return $this->accruedTaxCalculator->getAccruedTaxAmountFromGrossPrice($price, $taxRate);
    }

}
