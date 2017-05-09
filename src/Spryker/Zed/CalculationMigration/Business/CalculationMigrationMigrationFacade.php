<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CalculationMigration\Business;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
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

    /**
     * Specification:
     *  - Loops over items with options and discounts, calculates tax
     *  - Loops over expenses with discounts, calculates tax
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculateItemWithProductOptionsAndDiscountsTaxAmount(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createItemProductOptionsAndDiscountsTaxCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specification:
     *  - Loops over items with options and discounts
     *  - Loops over expenses with discounts
     *  - Summ all tax amounts calculated
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculateOrderTotalTaxAmountWithDiscounts(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createOrderTotalWithDiscountsTaxCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specification:
     *  - Read order discounts from persistence
     *  - Assign discount to each coresponding item
     *  - Calculate item and product option discount amount fields with discount
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculateItemWithProductOptionsAndDiscountsGrossPrice(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createProductOptionDiscountCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specification:
     *  - Loops over product option discount with discount sum
     *  - Calculates totals with product options
     *  - Amounts stored: QuoteTransfer->getTotals()->setDiscountTotal()
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculateDiscountTotalsWithProductOptions(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createDiscountTotalWithProductOptionsCalculator()->recalculate($quoteTransfer);
    }

    /**
     * Specification:
     *  - Loops over product option calculated discounts and sums up to order total
     *  - Amounts stored in OrderTransfer->getCalculatedDiscounts()
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    public function aggregateOrderCalculatedDiscounts(OrderTransfer $orderTransfer)
    {
        $this->getFactory()->createOrderDiscountAggregator()->aggregate($orderTransfer);
    }

    /**
     * Specification:
     *  - Loops over product option discount with discount sum
     *  - Calculates totals with product options
     *  - Amounts stored: OrderTransfer->getTotals()->setDiscountTotal()
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    public function aggregateOrderTotalDiscountAmount(OrderTransfer $orderTransfer)
    {
        $this->getFactory()->createDiscountTotalWithProductOptionsCalculator()->aggregate($orderTransfer);
    }

    /**
     * Specification:
     *  - Read order discounts from persistence
     *  - Assign discount to each coresponding item
     *  - Calculate item and product option discount amount fields with discount
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    public function aggregateItemWithProductOptionsDiscounts(OrderTransfer $orderTransfer)
    {
        $this->getFactory()->createProductOptionDiscountCalculator()->aggregate($orderTransfer);
    }

    /**
     * Specification:
     *  - Loops over items with discounts
     *  - Calculate discount amount for items after discounts
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    public function aggregateItemWithProductOptionsAndDiscountsTaxAmount(OrderTransfer $orderTransfer)
    {
        $this->getFactory()->createItemProductOptionsAndDiscountsTaxCalculator()->aggregate($orderTransfer);
    }

    /**
     * Specification:
     *  - Loops over items with options and discounts
     *  - Loops over expenses with discounts
     *  - Summ all tax amounts calculated
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return void
     */
    public function aggregateOrderTotalTaxAmountWithDiscounts(OrderTransfer $orderTransfer)
    {
        $this->getFactory()->createOrderTotalWithDiscountsTaxCalculator()->aggregate($orderTransfer);
    }

    /**
     * Specification:
     *  - Loops over calculable items and sum all item taxes, including expenses
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function calculateTaxTotals(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()
            ->createTaxCalculator()
            ->recalculate($quoteTransfer);
    }

    /**
     * Specification:
     *  - Calculate tax amount for each item
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculateTaxItemAmount(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()
            ->createTaxItemAmountCalculator()
            ->recalculate($quoteTransfer);
    }

    /**
     * Specification:
     *  - Calculate tax amount for each expense item
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function recalculateExpenseTaxAmount(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()
            ->createExpenseTaxCalculator()
            ->recalculate($quoteTransfer);
    }


}
