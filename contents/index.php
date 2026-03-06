<?php 
$cms->title = 'UC Berkeley Folklore Archive';
$user = check_auth(); 
?>
<div style="margin-left:520px" class="small-label">
	<form id="role_form" action="handler/collector/<?php echo $user->get('id');?>/role" method="post">
	<?php
	$user = check_auth();
	if ($user->get('sid')== 'tango'|| $user->get('sid')=='jwan123'){
		$status_array = array('0'=>"regular user", '1'=>"admin");
		echo "You login as " . $status_array[$user->get('status')-1];
		$new_status = !($user->get('status')-1)+1;
		echo ". <a href='javascript:$(\"#collector_status\").val(".$new_status.");submitform(\"role_form\");'>Click to switch to ".  $status_array[!($user->get('status')-1)]."</a>";
	}
	?>
	<input type="hidden" id="collector_status" name="collector_status" value="">
	</form>
</div>
<div class="archive-hero">
  <div class="hero-text">
    <h1 class="hero-title">UC Berkeley<br>Folklore Archive</h1>
    <p class="hero-desc">
      A growing digital collection of folklore and oral traditions gathered by
      students and researchers affiliated with UC Berkeley's Folklore program.
      The archive documents expressive culture across communities, languages, and regions.
    </p>
    <div class="hero-actions">
      <a href="map" class="btn-primary">Explore the Map</a>
      <a href="dashboard" class="btn-secondary">My Dashboard</a>
    </div>
  </div>
</div>
<div class="archive-about">
  <p class="display-text">
    Fieldwork records are contributed through a web interface and stored in a searchable
    database maintained by the UC Berkeley Folklore program. Use the map to explore records
    geographically, or browse the full collection using the navigation menu.
  </p>
</div>