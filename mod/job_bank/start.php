<?php
/**
 * Job Bank plugin
 */
elgg_register_event_handler('init', 'system', 'job_bank_init');

/**
 * Job Bank plugin initialization functions.
 */
function job_bank_init() {

  // register a library of helper functions
  elgg_register_library('elgg:job_bank', elgg_get_plugins_path() . 'job_bank/lib/job_bank.php');

  // Site navigation
  $item = new ElggMenuItem('job_bank', elgg_echo('job_bank'), 'job_bank/all');
  elgg_register_menu_item('site', $item);

  // Extend CSS
  elgg_extend_view('css/elgg', 'job_bank/css');

  // add enclosure to rss item
  elgg_extend_view('extensions/item', 'job_bank/enclosure');

  // extend group main page
  elgg_extend_view('groups/tool_latest', 'job_bank/group_module');

  // Register a page handler
  elgg_register_page_handler('job_bank', 'job_bank_page_handler');

  // Add a new job bank widget
  elgg_register_widget_type('jobrepo', elgg_echo("job_bank"), elgg_echo("job_bank:widget:description"));

  // Register URL handlers for job listings
  elgg_register_entity_url_handler('object', 'job_listing', 'job_listing_url_override');
  elgg_register_plugin_hook_handler('entity:icon:url', 'object', 'job_listing_icon_url_override');

  // Register granular notification for this object type
  register_notification_object('object', 'job_listing', elgg_echo('job_bank:newupload'));

  // Listen to notification events and supply a more useful message
  elgg_register_plugin_hook_handler('notify:entity:message', 'object', 'job_listing_notify_message');

  // add the group job listings tool option
  add_group_tool_option('job_bank', elgg_echo('groups:enablelistings'), true);

  // Register entity type
  elgg_register_entity_type('object', 'job_listing');

  // Tell Elgg that object subtype "job_listing" should be loaded using the JobBankPluginFile class
  // If you ever change the name of the class, use update_subtype() to change it
  // add_subtype('object', 'job_listing', 'JobBankPluginFile'); // Didn't work since entry was already made in elgg_entity_subtypes db table...
  update_subtype('object', 'job_listing', 'JobBankPluginFile'); // THIS worked. Thanks for documenting, Elgg! d^^b

  // add a job listing link to owner blocks
  elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'job_listing_owner_block_menu');

  // Register actions
  $action_path = elgg_get_plugins_path() . 'job_bank/actions/job_bank';
  elgg_register_action("job_bank/upload", "$action_path/upload.php");
  elgg_register_action("job_bank/delete", "$action_path/delete.php");
  // temporary - see #2010
  elgg_register_action("job_bank/download", "$action_path/download.php");

  // embed support
  $item = ElggMenuItem::factory(array(
    'name' => 'job_bank',
    'text' => elgg_echo('job_bank'),
    'priority' => 10,
    'data' => array(
      'options' => array(
        'type' => 'object',
        'subtype' => 'job_listing',
      ),
    ),
  ));
  elgg_register_menu_item('embed', $item);

  $item = ElggMenuItem::factory(array(
    'name' => 'job_bank_upload',
    'text' => elgg_echo('job_bank:upload'),
    'priority' => 100,
    'data' => array(
      'view' => 'embed/job_listing_upload/content',
    ),
  ));

  elgg_register_menu_item('embed', $item);
}

/**
 * Dispatches job bank pages.
 * URLs take the form of
 *  All job listings:       job_bank/all
 *  User's job listings:    job_bank/owner/<username>
 *  Friends' job listings:  job_bank/friends/<username>
 *  View job listing:       job_bank/view/<guid>/<title>
 *  New job listing:        job_bank/add/<guid>
 *  Edit job listing:       job_bank/edit/<guid>
 *  Group job listings:     job_bank/group/<guid>/all
 *  Download job listing:   job_bank/download/<guid>
 *
 * Title is ignored
 */
function job_bank_page_handler($page) {

  if (!isset($page[0])) {
    $page[0] = 'all';
  }

  $job_bank_dir = elgg_get_plugins_path() . 'job_bank/pages/job_bank';

  $page_type = $page[0];
  switch ($page_type) {
    case 'owner':
      job_bank_register_toggle();
      include "$job_bank_dir/owner.php";
      break;
    case 'friends':
      job_bank_register_toggle();
      include "$job_bank_dir/friends.php";
      break;
    case 'read': // Elgg 1.7 compatibility
      register_error(elgg_echo("changebookmark"));
      forward("job_bank/view/{$page[1]}");
      break;
    case 'view':
      set_input('guid', $page[1]);
      include "$job_bank_dir/view.php";
      break;
    case 'add':
      include "$job_bank_dir/upload.php";
      break;
    case 'edit':
      set_input('guid', $page[1]);
      include "$job_bank_dir/edit.php";
      break;
    case 'search':
      job_bank_register_toggle();
      include "$job_bank_dir/search.php";
      break;
    case 'group':
      job_bank_register_toggle();
      include "$job_bank_dir/owner.php";
      break;
    case 'all':
      job_bank_register_toggle();
      include "$job_bank_dir/world.php";
      break;
    case 'download':
      set_input('guid', $page[1]);
      include "$job_bank_dir/download.php";
      break;
    default:
      return false;
  }
  return true;
}

/**
 * Adds a toggle to extra menu for switching between list and gallery views
 */
function job_bank_register_toggle() {
  $url = elgg_http_remove_url_query_element(current_page_url(), 'list_type');

  if (get_input('list_type', 'list') == 'list') {
    $list_type = "gallery";
    $icon = elgg_view_icon('grid');
  } else {
    $list_type = "list";
    $icon = elgg_view_icon('list');
  }

  if (substr_count($url, '?')) {
    $url .= "&list_type=" . $list_type;
  } else {
    $url .= "?list_type=" . $list_type;
  }


  elgg_register_menu_item('extras', array(
    'name' => 'job_list',
    'text' => $icon,
    'href' => $url,
    'title' => elgg_echo("job_bank:list:$list_type"),
    'priority' => 1000,
  ));
}

/**
 * Creates the notification message body
 */
function job_listing_notify_message($hook, $entity_type, $returnvalue, $params) {
  $entity = $params['entity'];
  $to_entity = $params['to_entity'];
  $method = $params['method'];
  if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'job_listing')) {
    $descr = $entity->description;
    $title = $entity->title;
    $owner = $entity->getOwnerEntity();
    return elgg_echo('job_bank:notification', array(
      $owner->name,
      $title,
      $descr,
      $entity->getURL()
    ));
  }
  return null;
}

/**
 * Add a menu item to the user ownerblock
 */
function job_listing_owner_block_menu($hook, $type, $return, $params) {
  if (elgg_instanceof($params['entity'], 'user')) {
    $url = "job_bank/owner/{$params['entity']->username}";
    $item = new ElggMenuItem('job_bank', elgg_echo('job_bank'), $url);
    $return[] = $item;
  } else {
    if ($params['entity']->file_enable != "no") {
      $url = "job_bank/group/{$params['entity']->guid}/all";
      $item = new ElggMenuItem('job_bank', elgg_echo('job_bank:group'), $url);
      $return[] = $item;
    }
  }

  return $return;
}

/**
 * Returns an overall job listing type from the mimetype
 */
function job_listing_get_simple_type($mimetype) {

  switch ($mimetype) {
    case "application/msword":
    case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
      return "document";
      break;
    case "application/pdf":
      return "document";
      break;
    case "application/ogg":
      return "audio";
      break;
  }

  if (substr_count($mimetype, 'text/')) {
    return "document";
  }

  if (substr_count($mimetype, 'audio/')) {
    return "audio";
  }

  if (substr_count($mimetype, 'image/')) {
    return "image";
  }

  if (substr_count($mimetype, 'video/')) {
    return "video";
  }

  if (substr_count($mimetype, 'opendocument')) {
    return "document";
  }

  return "general";
}

/**
 * Returns a list of job listing types
 */
function job_listing_get_type_cloud($container_guid = "", $friends = false) {

  $container_guids = $container_guid;

  if ($friends) {
    // tags interface does not support pulling tags on friends' content so
    // we need to grab all friends
    $friend_entities = get_user_friends($container_guid, "", 999999, 0);
    if ($friend_entities) {
      $friend_guids = array();
      foreach ($friend_entities as $friend) {
        $friend_guids[] = $friend->getGUID();
      }
    }
    $container_guids = $friend_guids;
  }

  elgg_register_tag_metadata_name('simpletype');
  $options = array(
    'type' => 'object',
    'subtype' => 'job_listing',
    'container_guids' => $container_guids,
    'threshold' => 0,
    'limit' => 10,
    'tag_names' => array('simpletype')
  );
  $types = elgg_get_tags($options);

  $params = array(
    'friends' => $friends,
    'types' => $types,
  );

  return elgg_view('job_bank/typecloud', $params);
}

/**
 * Populates the ->getUrl() method for job listing objects
 */
function job_listing_url_override($entity) {
  $title = $entity->title;
  $title = elgg_get_friendly_title($title);
  return "job_bank/view/" . $entity->getGUID() . "/" . $title;
}

/**
 * Override the default entity icon for job listings
 *
 * Plugins can override or extend the icons using the plugin hook: 'job_bank:icon:url', 'override'
 */
function job_listing_icon_url_override($hook, $type, $returnvalue, $params) {
  $job_listing = $params['entity'];
  $size = $params['size'];
  if (elgg_instanceof($job_listing, 'object', 'job_listing')) {

    // thumbnails get first priority
    if ($job_listing->thumbnail) {
      $ts = (int)$job_listing->icontime;
      return "mod/job_bank/thumbnail.php?job_listing_guid=$job_listing->guid&size=$size&icontime=$ts";
    }

    $mapping = array(
      'application/excel' => 'excel',
      'application/msword' => 'word',
      'application/ogg' => 'music',
      'application/pdf' => 'pdf',
      'application/powerpoint' => 'ppt',
      'application/vnd.ms-excel' => 'excel',
      'application/vnd.ms-powerpoint' => 'ppt',
      'application/vnd.oasis.opendocument.text' => 'openoffice',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'word',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'excel',
      'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'ppt',
      'application/x-gzip' => 'archive',
      'application/x-rar-compressed' => 'archive',
      'application/x-stuffit' => 'archive',
      'application/zip' => 'archive',

      'text/directory' => 'vcard',
      'text/v-card' => 'vcard',

      'application' => 'application',
      'audio' => 'music',
      'text' => 'text',
      'video' => 'video',
    );

    $mime = $job_listing->mimetype;
    if ($mime) {
      $base_type = substr($mime, 0, strpos($mime, '/'));
    } else {
      $mime = 'none';
      $base_type = 'none';
    }

    if (isset($mapping[$mime])) {
      $type = $mapping[$mime];
    } elseif (isset($mapping[$base_type])) {
      $type = $mapping[$base_type];
    } else {
      $type = 'general';
    }

    if ($size == 'large') {
      $ext = '_lrg';
    } else {
      $ext = '';
    }
    
    $url = "mod/job_bank/graphics/icons/{$type}{$ext}.gif";
    $url = elgg_trigger_plugin_hook('job_bank:icon:url', 'override', $params, $url);
    return $url;
  }
}
