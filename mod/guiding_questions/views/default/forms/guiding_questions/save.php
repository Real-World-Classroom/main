<div id="gq-border"></div>
<?php 
    // get all active question objects
    $actives = elgg_get_entities_from_metadata(array(
        'type' => 'object',
        'subtype' => 'guiding_question',
        'metadata_name_value_pairs' => array(
                'name' => 'active',
                'value' => TRUE
            ),
        'limit' => FALSE
    ));
    // reverse chronological order is more logical for listing questions
    $actives = array_reverse($actives);
    
    // build an answer input box and link to past answers button for each question
    $i = 0; // need a counter
    foreach ($actives as &$active) {
        $i++;
        $active_title = $active->title;
        $active_guid = $active->guid;
        echo "<div>
                <div class='gq-question-title'>
                  <label>
                    <h3>$i.</h3>&nbsp; $active_title
                  </label>
                </div>";
                echo elgg_view('input/longtext',array('name' => 'answer_'.$i));
          echo "<div class='gq-past-answers-button'>
                  <a class='elgg-button elgg-button-cancel' href='/realworldclassroom/guiding_questions/view/".$active_guid."'>
                    View your past answers here
                  </a>
                </div>
              </div>";
        // need to pass along question title and guid
        echo elgg_view('input/hidden',array('name' => 'question_'.$i.'_title', 'value' => $active_title));
        echo elgg_view('input/hidden',array('name' => 'question_'.$i.'_guid', 'value' => $active_guid));
    }
    // also submit total number of active questions as we'll need it later
    echo elgg_view('input/hidden',array('name' => 'num_of_actives', 'value' => $i));
?>
<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('Save All Answers'),
                                               'id' => 'gq-save-answers-button')); ?>
</div>
