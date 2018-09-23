<div class="ui-widget" style="margin-top:50px">
    <label for="tags">Tags: </label>
    <input id="tags">
</div>

<script>
    var availablePosts = [
<?php
$allposts = get_posts(array(
    "post_type" => "post",
    "post_status" => "publish"
        ));

foreach ($allposts as $inx => $stx) {
    echo '"'.$stx->post_title.'",';
}
?>
    ];
</script>