<?php

/**
 * @file
 * Implementation of hook_form_system_theme_settings_alter()
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 *
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */

/**
 *
 */
function marinelli_form_system_theme_settings_alter(&$form, &$form_state) {
  // Layout Width Settings.
  $form['layout'] = [
    '#type' => 'details',
    '#title' => t('Layout Settings'),
    '#weight' => -998,
    '#open' => TRUE,
  ];
  $form['layout']['layout_width'] = [
    '#type' => 'select',
    '#title' => t('Layout width'),
    '#default_value' => theme_get_setting('layout_width'),
    '#description' => t('1048px layout could show <strong>horizontal bars </strong> with lower resolutions...but honestly i think we are ready to make a wider web...'),
    '#options' => [
      1 => t('Fixed, 1048px width'),
      2 => t('Fixed, 988px width'),
    ],
  ];
  $form['layout']['layout_type'] = [
    '#type' => 'select',
    '#title' => t('Layout Type'),
    '#description' => t('Choose a layout type'),
    '#default_value' => theme_get_setting('layout_type'),
    '#options' => [
      1 => t('Content on the left'),
      2 => t('Content in the middle'),
      3 => t('Content on the right'),
    ],
  ];
  $form['layout']['blocks'] = [
    '#type' => 'select',
    '#title' => t('Do you want to hide block title for the external blocks?'),
    '#description' => t('If you choose yes, block title will show only for sidebar blocks. The title will be hidden in all the other blocks (but not removed from source)'),
    '#default_value' => theme_get_setting('blocks'),
    '#options' => [
      1 => t('YES'),
      2 => t('NO'),
    ],
  ];
  $form['accessibility'] = [
    '#type' => 'details',
    '#title' => t('Accessibility and code semantics settings'),
    '#open' => TRUE,
    '#weight' => -996,
  ];
  // Accessibility and code semantics settings.
  $form['accessibility']['outside_tags'] = [
    '#type' => 'select',
    '#title' => t('Do you want to use p tag for all the section titles that come before main site content?'),
    '#description' => t('If you choose yes, the theme will try to comply WCAG2 headings specifications by using the p tag instead of h2 for all the section title tags that come before the main content (for example banner title and top region block titles) '),
    '#default_value' => theme_get_setting('outside_tags'),
    '#options' => [
      0 => t('NO'),
      1 => t('YES'),
    ],
  ];
  $form['accessibility']['title_tags'] = [
    '#type' => 'select',
    '#title' => t('Do you want to use h1 and h2 tags for site title and site slogan on the front page?'),
    '#description' => t('If you choose NO, the theme will force the p tag for title and slogan in every page. This might help with WCAG2 headings specification if you front page has the page title'),
    '#default_value' => theme_get_setting('title_tags'),
    '#options' => [
      0 => t('YES'),
      1 => t('NO'),
    ],
  ];
  $form['accessibility']['menu_headings'] = [
    '#type' => 'select',
    '#title' => t('Which tag do you want to use for menu section titles?'),
    '#description' => t('Using headings will improve screen-reader based navigation, however you will fail Wcag2 headings order recommendations'),
    '#default_value' => theme_get_setting('menu_headings'),
    '#options' => [
      1 => t('only <li>'),
      2 => t('<h2> for first level and <h3> for megamenu sections'),
    ],
  ];
  // Text vars form.
  $form['text_vars'] = [
    '#type' => 'details',
    '#title' => t('String settings'),
    '#open' => TRUE,
  ];
  // Text vars. elements.
  $form['text_vars']['sticky_text'] = [
    '#type' => 'textfield',
    '#title' => t('text of the sticky icon'),
    '#default_value' => theme_get_setting('sticky_text'),
  ];
  $form['text_vars']['bartext'] = [
    '#type' => 'textfield',
    '#title' => t('text of the top bar slide button'),
    '#default_value' => theme_get_setting('bartext'),
  ];
  $form['text_vars']['bartext2'] = [
    '#type' => 'textfield',
    '#title' => t('text of opened top bar slide button'),
    '#default_value' => theme_get_setting('bartext2'),
  ];
  // CSS 3 Settings.
  $form['css3'] = [
    '#type' => 'details',
    '#title' => t('css3 settings'),
    '#open' => TRUE,
  ];
  // // css3 elements.
  $form['css3']['css'] = [
    '#type' => 'select',
    '#title' => t('Do you want to use css3 effects?'),
    '#description' => t('With css3 you can have some additional css-based styles such as rounded corners and text shadows. This effects work only with some browsers. <strong>With css3 enabled you will probably fail css validation</strong>'),
    '#options' => [
      1 => t('Css3 On'),
      2 => t('Css3 Off'),
    ],
    '#default_value' => theme_get_setting('css'),
  ];

  $form['css3']['css_typo'] = [
    '#type' => 'select',
    '#title' => t('Do you want to use css3 font face embedding?'),
    '#description' => t('With this option enabled we can use css3 nice fonts (Loading fonts may slow down page loading) <strong>You need to enable css3 to use this feature</strong>'),
    '#options' => [
      1 => t('Font face OFF'),
      2 => t('Font Face ON'),
    ],
    '#default_value' => theme_get_setting('css_typo'),
  ];
}
