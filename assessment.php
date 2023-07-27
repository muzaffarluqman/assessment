<?php

function isSimilar($sentence1, $sentence2, $similarWords): bool {
  

    
    //For Condition 1 & 2: 
    $sentence1 = explode(" ", strtolower($sentence1));
    $sentence2 = explode(" ", strtolower($sentence2));
    
    //For Condition 1: 
    if (count($sentence1) !== count($sentence2)) {
        return false;
    }
  for ($i = 0; $i < count($sentence1); $i++) {
    $word1 = $sentence1[$i];
    $word2 = $sentence2[$i];

    if (!areWordsEqual($word1, $word2) && !isSimilarWord($word2, $similarWords) && !isSimilarWord($word1, $similarWords)) {
      return false;
    }
  }
  return true;
}

  // For Condition 4: 
  function isSimilarWord($word, $similarWords): bool {
    foreach ($similarWords as $group) {
      foreach ($group as $similarWord) {
        if (areWordsEqual($similarWord, $word)) {
          return true;
        }
      }
    }
    return false;
  }

  //For Condition 3: 
  function areWordsEqual($word1, $word2): bool {
    return $word1 === $word2;
  }

// Example usage
$sentence1="I love apples";
$sentence2="I adore oranges";
$similarWords = [["love", "adore"], ["apples", "oranges"]];
$result = isSimilar($sentence1, $sentence2, $similarWords);
var_dump($result); 
?>
