<?php

namespace Drupal\rickyandmorty\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a twig template where the form fields and remaining markup are rendered
 *
 * @Block(
 *   id = "ricky_and_morty",
 *   admin_label = @Translation("Block for the Ricky and Morty API connection"),
 *   category = @Translation("Ricky and Morty API connection"),
 * )
 */
class rickyMortyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    return [
      '#theme' => 'rickyandmorty_content',
      '#attached' => [
        'library' => [
          'rickyandmorty/rickyandmorty'
        ],
      ],
    ];
  }
}