<div>
    <label><?php echo elgg_echo("Question #1:"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'answer1')); ?>
</div>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>