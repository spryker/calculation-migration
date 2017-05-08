<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CalculationMigration\Business;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\CalculationMigration\Business\CalculationMigrationBusinessFactory getFactory()
 * @method \Spryker\Zed\CalculationMigration\CalculationMigrationConfig getConfig()
 */
class CalculationMigrationMigrationFacade extends AbstractFacade implements CalculationMigrationFacadeInterface
{

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateExpenseGrossSumAmount(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createExpenseGrossSumAmount()->recalculate($quoteTransfer);
    }

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateExpenseTotals(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createExpenseTotalsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateGrandTotalTotals(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createGrandTotalsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateItemGrossAmounts(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createItemGrossSumCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateOptionGrossSum(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createOptionGrossSumCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function removeTotals(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createRemoveTotalsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specific calculator
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateSubtotalTotals(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createSubtotalTotalsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateDiscountTotals(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createDiscountTotalsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function removeAllCalculatedDiscounts(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createRemoveAllCalculatedDiscountsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateGrandTotalWithDiscounts(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createGrandTotalWithDiscountsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateSumGrossCalculatedDiscountAmount(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createSumGrossCalculatedDiscountAmountCalculator()->recalculate($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateExpenseTaxWithDiscounts(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createExpenseTaxWithDiscountsCalculator()->recalculate($quoteTransfer);
    }


}
