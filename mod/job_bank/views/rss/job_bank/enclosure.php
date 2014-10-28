<?php
/**
 * Link to download the job listing
 */
if (elgg_instanceof($vars['entity'], 'object', 'job_bank')) {
	$download_url = elgg_get_site_url() . 'job_bank/download/' . $vars['entity']->getGUID();
	$size = $vars['entity']->size();
	$mime_type = $vars['entity']->getMimeType();
	echo <<<END

	<enclosure url="$download_url" length="$size" type="$mime_type" />
END;
}
