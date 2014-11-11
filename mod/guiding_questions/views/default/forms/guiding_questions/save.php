<?php 
$question_1_title = elgg_get_plugin_setting('question_1_title', 'guiding_questions');
$question_2_title = elgg_get_plugin_setting('question_2_title', 'guiding_questions');
$question_3_title = elgg_get_plugin_setting('question_3_title', 'guiding_questions');
$question_4_title = elgg_get_plugin_setting('question_4_title', 'guiding_questions');
$question_5_title = elgg_get_plugin_setting('question_5_title', 'guiding_questions');
$question_6_title = elgg_get_plugin_setting('question_6_title', 'guiding_questions');
?>

<div id="gq-border"></div>
<div>
    <div class="gq-question-title">
        <label>
            <?php echo elgg_echo("<h3>1.</h3>&nbsp; $question_1_title"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer1')); ?>
    <div class="gq-past-answers-button">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/1">
            View your past answers here</a>
    </div>
</div>

<div>
    <div class="gq-question-title">
        <label>
            <?php echo elgg_echo("<h3>2.</h3>&nbsp; $question_2_title"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer2')); ?>
    <div class="gq-past-answers-button">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/2">
            View your past answers here</a>
    </div>
</div>

<div>
    <div class="gq-question-title">
        <label>
            <?php echo elgg_echo("<h3>3.</h3>&nbsp; $question_3_title"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer3')); ?>
    <div class="gq-past-answers-button">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/3">
            View your past answers here</a>
    </div>
</div>

<div>
    <div class="gq-question-title">
        <label>
            <?php echo elgg_echo("<h3>4.</h3>&nbsp; $question_4_title"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer4')); ?>
    <div class="gq-past-answers-button">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/4">
            View your past answers here</a>
    </div>
</div>

<div>
    <div class="gq-question-title">
        <label>
            <?php echo elgg_echo("<h3>5.</h3>&nbsp; $question_5_title"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer5')); ?>
    <div class="gq-past-answers-button">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/5">
            View your past answers here</a>
    </div>
</div>

<div>
    <div class="gq-question-title">
        <label>
            <?php echo elgg_echo("<h3>6.</h3>&nbsp; $question_6_title"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer6')); ?>
    <div class="gq-past-answers-button">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/6">
            View your past answers here</a>
    </div>
</div>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('Save All Answers'),
                                               'id' => 'gq-save-answers-button')); ?>
</div>
