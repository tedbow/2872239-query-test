<?php

namespace Drupal\tester\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\tester\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Message.
   *
   * @return string
   *   Return Hello string.
   */
  public function message() {
    //drupal_set_message('bo bo');
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: message')
    ];
  }

  public function doQuery() {
    $field_id = 'moderation_state_update';
    // repalace with actual update ids.
    $all_ready_update_ids = [1 => "1"];
    $storage = \Drupal::entityTypeManager()->getStorage('node');
    $query = $storage->getQuery('AND');
    $query->condition("$field_id.target_id", $all_ready_update_ids, 'IN');

    $query->allRevisions();
    $entity_ids = $query->execute();

    return [
      '#type' => 'markup',
      '#markup' => "entity ids = " . implode(',', $entity_ids),
    ];

  }

}
