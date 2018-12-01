<?php

namespace Drupal\ymaps_geolocation\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'ymaps_geolocation' widget.
 *
 * @FieldWidget(
 *   id = "ymaps_geolocation",
 *   label = @Translation("Geolocation Yandex map"),
 *   field_types = {
 *     "geolocation"
 *   }
 * )
 */
class YmapsGeolocationWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $map_id = $items->getName() . '-' . $delta;
    $element += [
      '#type' => 'fieldset',
      '#title' => $this->t('Map'),
    ];

    $value = $items[$delta] ?? [];
    $lat = $value->lat ?? NULL;
    $lng = $value->lng ?? NULL;

    // Map information.
    $element['map_container'] = [
      '#title' => $this->t('Preview'),
      '#type' => 'html_tag',
      '#tag' => 'div',
      '#suffix' => '<div class="geo-placemark"></div>',
      '#attributes' => [
        'id' => $map_id,
        'class' => 'ymaps-geolocation-map',
        'style' => 'width: 100%; height: 400px;',
      ],
    ];

    $element['lat'] = [
      '#type' => 'hidden',
      '#default_value' => $items[$delta]->lat,
      '#attributes' => ['class' => ['field-ymaps-lat-' . $map_id]],
    ];

    $element['lng'] = [
      '#type' => 'hidden',
      '#default_value' => $items[$delta]->lng,
      '#attributes' => ['class' => ['field-ymaps-lng-' . $map_id]],
    ];

    // Map initialization parameters.
    $map = [
      'init' => [
        'center' => [$lat, $lng],
        'zoom' => 16,
        'type' => 'yandex#map',
        'behaviors' => ['scrollZoom', 'dblClickZoom', 'drag'],
        'controls' => ["zoomControl", "searchControl", "typeSelector",
          "fullscreenControl",
        ],
      ],
      'display' => [
        'width' => '100%',
        'height' => '400px',
        'auto_centering' => TRUE,
        'auto_zooming' => FALSE,
      ],
      'placemark' => [
        'coordinates' => [$lat, $lng],
        'preset' => '',
      ],
      'edit' => TRUE,
    ];

    $element['#attached']['drupalSettings']['ymaps'][$map_id] = $map;
    $element['#attached']['library'][] = 'ymaps_geolocation/ymaps-init';

    return $element;
  }

}
