<p>
<?php echo elgg_echo("guiding_questions:settings:titles");?>
<br>
  <?php
    echo "<label>".elgg_echo('guiding_questions:question_1_title')."</label>";
    echo "<input type='text' size='60' name='params[question_1_title]' value='".$vars['entity']->question_1_title."' />";
    echo "<br />";

    echo "<label>".elgg_echo('guiding_questions:question_2_title')."</label>";
    echo "<input type='text' size='60' name='params[question_2_title]' value='".$vars['entity']->question_2_title."' />";
    echo "<br />";

    echo "<label>".elgg_echo('guiding_questions:question_3_title')."</label>";
    echo "<input type='text' size='60' name='params[question_3_title]' value='".$vars['entity']->question_3_title."' />";
    echo "<br />";

    echo "<label>".elgg_echo('guiding_questions:question_4_title')."</label>";
    echo "<input type='text' size='60' name='params[question_4_title]' value='".$vars['entity']->question_4_title."' />";
    echo "<br />";

    echo "<label>".elgg_echo('guiding_questions:question_5_title')."</label>";
    echo "<input type='text' size='60' name='params[question_5_title]' value='".$vars['entity']->question_5_title."' />";
    echo "<br />";

    echo "<label>".elgg_echo('guiding_questions:question_6_title')."</label>";
    echo "<input type='text' size='60' name='params[question_6_title]' value='".$vars['entity']->question_6_title."' />";
    echo "<br />";
  ?>
</p>
