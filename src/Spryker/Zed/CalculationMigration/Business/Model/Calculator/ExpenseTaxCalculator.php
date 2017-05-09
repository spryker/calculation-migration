<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CalculationMigration\Business\Model\Calculator;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Tax\Business\TaxFacadeInterface;

class ExpenseTaxCalculator implements CalculatorInterface
{

    /**
     * @var TaxFacadeInterface
     */
    protected $taxFacade;

    /**
     * @param TaxFacadeInterface $taxFacade
     */
    public function __construct(TaxFacadeInterface $taxFacade)
    {
        $this->taxFacade = $taxFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculate(QuoteTransfer $quoteTransfer)
    {
        $this->taxFacade->resetAccruedTaxCalculatorRoundingErrorDelta();
        foreach ($quoteTransfer->getExpenses() as $expenseTransfer) {
            $unitTaxAmount = $this->calculateTaxAmount(
                $expenseTransfer->getUnitGrossPrice(),
                $expenseTransfer->getTaxRate()
            );

            $sumTaxAmount = $this->calculateTaxAmount(
                $expenseTransfer->getSumGrossPrice(),
                $expenseTransfer->getTaxRate()
            );

            $expenseTransfer->setUnitTaxAmount((int)round($unitTaxAmount));
            $expenseTransfer->setSumTaxAmount((int)round($sumTaxAmount));

            $expenseTransfer->setUnitTaxTotal((int)round($unitTaxAmount));
            $expenseTransfer->setSumTaxTotal((int)round($sumTaxAmount));
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
        return $this->taxFacade->getTaxAmountFromGrossPrice($price, $taxRate);
    }

}
