<?php

namespace Drupal\rickyandmorty\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class RickyForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rickyandmorty_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // this is the configuration create in RickyMortyConfiguration.php for the placeholder
    $config = $this->config('rickyandmorty.settings');
    
    $form['search_filter'] = [
      '#type' => 'search',
      '#attributes' => [
        'id' => 'ricky-filter',
        'class' => ['robotto'],
        'placeholder' => $config->get('placeholder'),
      ],

    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
      
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

}