<!-- Create a new question -->
<div class="gq-settings-panel">
    <h2><em><?php echo elgg_echo("guiding_questions:settings:new_question");?></em></h2>
    <br>
    <?php echo elgg_view('input/text',array('name' => 'new_question'));?>
</div>

<!-- Activate/deactivate questions -->
<div class="gq-settings-panel">
    <h2><em><?php echo elgg_echo("guiding_questions:settings:activations");?></em></h2>
    <br>
    <!-- Activate Select -->
    <p>
        <?php
            // get all inactive question objects
            $inactives = elgg_get_entities_from_metadata(array(
                'type' => 'object',
                'subtype' => 'guiding_question',
                'metadata_name_value_pairs' => array(
                        'name' => 'active',
                        'value' => FALSE
                    ),
                'limit' => FALSE
            ));
            // reverse chronological order is more logical for listing questions
            $inactives = array_reverse($inactives);
            // build a list of inactives to insert as select options
            $inactive_list = "<option selected='selected' value='-1'>Select a question to activate</option>";
            foreach ($inactives as &$inactive) {
                $inactive_title = $inactive->title;
                $inactive_guid = $inactive->guid;
                $inactive_list .= "<option value='$inactive_guid'>$inactive_title</option>";
            }
            // fill the activate select with the $inactive_list
            echo "<label for='inactive_list'>".elgg_echo('guiding_questions:settings:activate')."</label>";
            echo "<select id='inactive_list' name='inactive_list'>$inactive_list</select>";
        ?>
    </p>
    <!-- Deactivate Select -->
    <p>
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
            // build a list of actives to insert as select options
            $active_list = "<option selected='selected' value='-1'>Select a question to deactivate</option>";
            foreach ($actives as &$active) {
                $active_title = $active->title;
                $active_guid = $active->guid;
                $active_list .= "<option value='$active_guid'>$active_title</option>";
            }
            // fill the deactivate select with the $active_list
            echo "<label for='active_list'>".elgg_echo('guiding_questions:settings:deactivate')."</label>";
            echo "<select id='active_list' name='active_list'>$active_list</select>";
        ?>
    </p>
</div>

<!-- Edit active question titles -->
<div class="gq-settings-panel">
    <h2><em><?php echo elgg_echo("guiding_questions:settings:edit_questions");?></em></h2>
    <strong><?php echo elgg_echo("guiding_questions:settings:edit_notice");?></strong>
    <br><br>
    <?php
        // already have active questions array in $actives from above
        $i = 0; // but need a counter this time
        // make a text edit box for each active question and submit the question's guid along with it
        foreach ($actives as &$active) {
            $i++;
            echo "<label>Guiding Question $i: </label>";
            echo elgg_view('input/text',array('name' => 'question_'.$i.'_title', 'value' => $active->title));
            echo elgg_view('input/hidden',array('name' => 'question_'.$i.'_guid', 'value' => $active->guid));
            echo "<br />";
        }
        // also submit total number of active questions as we'll need it later
        echo elgg_view('input/hidden',array('name' => 'num_of_actives', 'value' => $i));
    ?>
</div>
