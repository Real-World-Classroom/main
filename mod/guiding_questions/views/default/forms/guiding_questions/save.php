<div style="border-bottom: 1px solid #eeeeff; margin-bottom: 40px;"></div>
<div>
    <div style="margin-top:25px;">
        <label>
            <?php echo elgg_echo("<h3 style='display:inline;'>1.</h3> &nbsp;
                     What do you want right now, more than anything else?"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer1')); ?>
    <div style="margin: 5px 0; text-align: right;">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/1">
            View your past answers here</a>
    </div>
</div>

<div>
    <div style="margin-top:25px;">
        <label>
            <?php echo elgg_echo("<h3 style='display:inline;'>2.</h3> &nbsp;
                                                What would it do for you?"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer2')); ?>
    <div style="margin: 5px 0; text-align: right;">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/2">
            View your past answers here</a>
    </div>
</div>

<div>
    <div style="margin-top:25px;">
        <label>
            <?php echo elgg_echo("<h3 style='display:inline;'>3.</h3> &nbsp;
                                        How would you feel if you got it?"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer3')); ?>
    <div style="margin: 5px 0; text-align: right;">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/3">
            View your past answers here</a>
    </div>
</div>

<div>
    <div style="margin-top:25px;">
        <label>
            <?php echo elgg_echo("<h3 style='display:inline;'>4.</h3> &nbsp;
                                      How do you want to spend your time?"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer4')); ?>
    <div style="margin: 5px 0; text-align: right;">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/4">
            View your past answers here</a>
    </div>
</div>

<div>
    <div style="margin-top:25px;">
        <label>
            <?php echo elgg_echo("<h3 style='display:inline;'>5.</h3> &nbsp;
                                             What experience do you want?"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer5')); ?>
    <div style="margin: 5px 0; text-align: right;">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/5">
            View your past answers here</a>
    </div>
</div>

<div>
    <div style="margin-top:25px;">
        <label>
            <?php echo elgg_echo("<h3 style='display:inline;'>6.</h3> &nbsp;
                              What's your plan for getting what you want?"); ?>
        </label>
    </div>
    <?php echo elgg_view('input/longtext',array('name' => 'answer6')); ?>
    <div style="margin: 5px 0; text-align: right;">
        <a class="elgg-button elgg-button-cancel" href="/realworldclassroom/guiding_questions/view/6">
            View your past answers here</a>
    </div>
</div>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('Save All Answers'),
                                               'style' => "font-size: 20px;")); ?>
</div>
