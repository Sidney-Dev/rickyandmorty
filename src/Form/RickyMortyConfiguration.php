<?php

namespace Drupal\rickyandmorty\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * This class defines the form used to configure Rick and Morty configuration items
 * Initially, we are configuring the placeholder text
 */
class RickyMortyConfiguration extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rickyandmorty_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'rickyandmorty.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('rickyandmorty.settings');
    $form['placeholder'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter the placeholder text'),
      '#default_value' => $config->get('placeholder') ? $config->get('placeholder') : "Enter a character's name to get more information",
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('rickyandmorty.settings')
      ->set('placeholder', $form_state->getValue('placeholder'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}