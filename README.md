# Ymaps Geolocation field formatter

Модуль-форматтер для поля типа Geolocation. Дает возможность использовать Yandex map для вывода точки на карте с координатами, которые хранятся в Lat и Lang поля Geolocation.

Модуль можно так же использовать как для виджета выбора точки в редактировании ноды.

В настройках для балуна метки, можно использовать токены ноды в том числе и для вывода содержимого полей ноды.

## Установка и настройка модуля

1. Установить модуль https://www.drupal.org/project/geolocation
2. Установить этот модуль
3. На странице настроек /admin/config/content/ymaps_geolocation прописать API KEY для Yandex map, который нужно получить на странице https://tech.yandex.ru/maps/keys/
3. Создать поле типа Geolocation 
5. На странице настройки отображения формы типа материала выбрать форматтер Geolocation Yandex map
6. На странице настройки отображения типа материала выбрать форматтер Geolocation Yandex map и установить необходимые настройки для Yandex-карты.

Прочитать описание модуля можно здесь:
http://big-gu.ru/blog/modul-yandex-map-dlya-drupal-8

Исходники:
https://github.com/azzzis/ymaps_geolocation