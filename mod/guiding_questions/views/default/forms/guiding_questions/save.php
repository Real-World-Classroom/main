<div>
    <label><?php echo elgg_echo("What do you want right now, more than anything else?"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer1')); ?>
    <a href='/realworldclassroom/guiding_questions/view'>View past responses here</a>
</div>

<div>
    <label><?php echo elgg_echo("What would it do for you?"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer2')); ?>
</div>

<div>
    <label><?php echo elgg_echo("How would you feel if you got it?"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer3')); ?>
</div>

<div>
    <label><?php echo elgg_echo("How do you want to spend your time?"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer4')); ?>
</div>

<div>
    <label><?php echo elgg_echo("What experience do you want?"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer5')); ?>
</div>

<div>
    <label><?php echo elgg_echo("What's your plan for getting what you want?"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer6')); ?>
</div>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
