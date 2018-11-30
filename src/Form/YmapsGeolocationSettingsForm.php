<?php

namespace Drupal\ymaps_geolocation\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class YmapsGeolocationSettingsForm extends ConfigFormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'ymaps_geolocation_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ymaps_geolocation.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ymaps_geolocation.settings');

    $form['api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Yandex API key'),
      '#default_value' => $config->get('api_key'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    // Save the updated settings.
    $this->config('ymaps_geolocation.settings')
      ->set('api_key', $values['api_key'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}

