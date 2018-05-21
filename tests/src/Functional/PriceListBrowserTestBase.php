<?php

namespace Drupal\Tests\commerce_pricelist\Functional;

use Drupal\field\Tests\EntityReference\EntityReferenceTestTrait;
use Drupal\Tests\commerce\Functional\CommerceBrowserTestBase;

/**
 * Defines base class for shortcut test cases.
 */
abstract class PriceListBrowserTestBase extends CommerceBrowserTestBase {

  use EntityReferenceTestTrait;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'commerce_product',
    'commerce_order',
    'field_ui',
    'options',
    'taxonomy',
    'commerce_pricelist',
  ];

  /**
   * The product to test against.
   *
   * @var \Drupal\commerce_product\Entity\ProductInterface
   */
  protected $product;

  /**
   * The stores to test against.
   *
   * @var \Drupal\commerce_store\Entity\StoreInterface[]
   */
  protected $stores;

  /**
   * {@inheritdoc}
   */
  protected function getAdministratorPermissions() {
    return array_merge([
      'administer commerce_product',
      'administer commerce_product_type',
      'administer commerce_product fields',
      'administer commerce_product_variation fields',
      'administer commerce_product_variation display',
      'access commerce_product overview',
      'administer price_list',
      'administer price_list fields',
      'administer price_list_item fields',
      'administer price_list_item display',
      'access price_list overview',
    ], parent::getAdministratorPermissions());
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->stores = [$this->store];
    for ($i = 0; $i < 2; $i++) {
      $this->stores[] = $this->createStore();
    }
  }

}
