<?php
/**
 * Get category name from post
 * @param int $post_id
 * @return string
 */
function get_post_category($post_id) {
  $categories = get_the_category($post_id);
  return $categories[0]->name;
}

/**
 * Check, replace and returns the vowel if there is accent into it
 *
 * @param int $vogal
 * @return string
 */
function remove_acento_vogal($vogal) {
  // Mapping of accented vowels and corresponding unaccented vowels
  $vogaisAcentuadas = [
      'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
      'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
      'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
      'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
      'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
      'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
      'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
      'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
      'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
      'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U'
  ];

  // Checks if vowel is in accented vowel array
  if (array_key_exists($vogal, $vogaisAcentuadas)) {
      return $vogaisAcentuadas[$vogal]; // Retorna a vogal sem acento
  }

  return $vogal;
}

/**
 * Estimated reading time
 *
 * @return string
 */
function reading_time() {
    global $post;
    $content = get_post_field('post_content', $post->ID);
    $word_count = str_word_count(strip_tags($content));
    $readingtime = ceil($word_count / 200);
    if ($readingtime == 1) {
        $timer = " min";
    } else {
        $timer = " min";
    }
    $totalreadingtime = $readingtime . $timer;

    return $totalreadingtime;
}

/**
 * Estimated reading time for posts
 *
 * @return string
 */
function estimated_reading_time($post_id) {
  if(!$post_id) {
      $post_id = get_the_ID();
  }
  $content = get_post_field('post_content', $post_id);
  $word_count = str_word_count(strip_tags($content));
  $readingtime = ceil($word_count / 200);
  if ($readingtime == 1) {
      $timer = " min";
  } else {
      $timer = " min";
  }
  $totalreadingtime = $readingtime . $timer;

  return $totalreadingtime;
}