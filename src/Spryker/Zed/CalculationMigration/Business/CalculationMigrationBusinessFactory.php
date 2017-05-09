<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CalculationMigration\Business;

use Spryker\Zed\CalculationMigration\Business\Model\Calculator\DiscountTotalAmount;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\DiscountTotalsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseGrossSumAmountCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseTaxCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseTaxWithDiscountsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseTotalsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\GrandTotalTotalsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\GrandTotalWithDiscountsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ItemGrossAmountsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ItemProductOptionTaxWithDiscounts;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ItemTaxCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\OrderDiscounts;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\OrderTaxAmountWithDiscounts;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ProductOptionDiscounts;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\ProductOptionGrossSumCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\RemoveAllCalculatedDiscountsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\RemoveTotalsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\SubtotalTotalsCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\SumGrossCalculatedDiscountAmountCalculator;
use Spryker\Zed\CalculationMigration\Business\Model\Calculator\TaxCalculation;
use Spryker\Zed\CalculationMigration\CalculationMigrationDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Spryker\Zed\CalculationMigration\CalculationMigrationConfig getConfig()
 */
class CalculationMigrationBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseGrossSumAmountCalculator
     */
    public function createExpenseGrossSumAmount()
    {
        return new ExpenseGrossSumAmountCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseTotalsCalculator
     */
    public function createExpenseTotalsCalculator()
    {
        return new ExpenseTotalsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\GrandTotalTotalsCalculator
     */
    public function createGrandTotalsCalculator()
    {
        return new GrandTotalTotalsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ItemGrossAmountsCalculator
     */
    public function createItemGrossSumCalculator()
    {
        return new ItemGrossAmountsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ProductOptionGrossSumCalculator
     */
    public function createOptionGrossSumCalculator()
    {
        return new ProductOptionGrossSumCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\RemoveTotalsCalculator
     */
    public function createRemoveTotalsCalculator()
    {
        return new RemoveTotalsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\SubtotalTotalsCalculator
     */
    public function createSubtotalTotalsCalculator()
    {
        return new SubtotalTotalsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\DiscountTotalsCalculator
     */
    public function createDiscountTotalsCalculator()
    {
        return new DiscountTotalsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\GrandTotalWithDiscountsCalculator
     */
    public function createGrandTotalWithDiscountsCalculator()
    {
        return new GrandTotalWithDiscountsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\RemoveAllCalculatedDiscountsCalculator
     */
    public function createRemoveAllCalculatedDiscountsCalculator()
    {
        return new RemoveAllCalculatedDiscountsCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\SumGrossCalculatedDiscountAmountCalculator
     */
    public function createSumGrossCalculatedDiscountAmountCalculator()
    {
        return new SumGrossCalculatedDiscountAmountCalculator();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseTaxWithDiscountsCalculator
     */
    public function createExpenseTaxWithDiscountsCalculator()
    {
        return new ExpenseTaxWithDiscountsCalculator($this->getTaxFacade());
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\DiscountTotalAmount
     */
    public function createDiscountTotalWithProductOptionsCalculator()
    {
        return new DiscountTotalAmount();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ProductOptionDiscounts
     */
    public function createProductOptionDiscountCalculator()
    {
        return new ProductOptionDiscounts(
            $this->getDiscountQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ItemProductOptionTaxWithDiscounts
     */
    public function createItemProductOptionsAndDiscountsTaxCalculator()
    {
        return new ItemProductOptionTaxWithDiscounts(
            $this->getTaxFacade()
        );
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\OrderTaxAmountWithDiscounts
     */
    public function createOrderTotalWithDiscountsTaxCalculator()
    {
        return new OrderTaxAmountWithDiscounts();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\OrderDiscounts
     */
    public function createOrderDiscountAggregator()
    {
        return new OrderDiscounts();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\TaxCalculation
     */
    public function createTaxCalculator()
    {
        return new TaxCalculation();
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ItemTaxCalculator
     */
    public function createTaxItemAmountCalculator()
    {
        return new ItemTaxCalculator($this->getTaxFacade());
    }

    /**
     * @return \Spryker\Zed\CalculationMigration\Business\Model\Calculator\ExpenseTaxCalculator
     */
    public function createExpenseTaxCalculator()
    {
        return new ExpenseTaxCalculator($this->getTaxFacade());
    }

    /**
     * @return \Spryker\Zed\Tax\Business\TaxFacadeInterface
     */
    public function getTaxFacade()
    {
        return $this->getProvidedDependency(CalculationMigrationDependencyProvider::FACADE_TAX);
    }

    /**
     * @return \Spryker\Zed\Discount\Persistence\DiscountQueryContainerInterface
     */
    protected function getDiscountQueryContainer()
    {
        return $this->getProvidedDependency(CalculationMigrationDependencyProvider::QUERY_CONTAINER_DISCOUNT);
    }

}
