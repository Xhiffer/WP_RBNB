<?

/*
Template Name: Custom CreatPost
*/
get_header();
global $wpdb;
if ($_POST) {

    $post_title = $wpdb->escape($_POST['post_title']);
    $post_content = $wpdb->escape($_POST['post_content']);
    $post_status = $wpdb->escape($_POST['post_status']);
    $my_post = array();
    $my_post['post_title']    = 'My post';
    $my_post['post_content']  = 'This is my post.';
    $my_post['post_status']   = 'publish';
    wp_insert_post($my_post);
    echo "Post Created Successfully";
    exit();
}
?>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="post_title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">content</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="post_content">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">status</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="post_status">
  </div>
  <button type="submit" name="btnSubmit"class="btn btn-primary">Submit</button>
</form>
<?php
get_footer();
?>

