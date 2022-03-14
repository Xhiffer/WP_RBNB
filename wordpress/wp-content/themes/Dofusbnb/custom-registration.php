<?

/*
Template Name: Custom Registration Page
*/
get_header();
global $wpdb;
if ($_POST) {

    $username = $wpdb->escape($_POST['txtUsername']);
    $email = $wpdb->escape($_POST['txtEmail']);
    $password = $wpdb->escape($_POST['txtPassword']);
    $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);
    $role = $wpdb->escape($_POST['txtrole']);

    $error = array();
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space";
    }

    if (empty($username)) {
        $error['username_empty'] = "Needed Username must";
    }

    if (username_exists($username)) {
        $error['username_exists'] = "Username already exists";
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value";
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists";
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password didn't match";
    }

    if (count($error) == 0) {

        $user_id=  wp_create_user($username, $password, $email);
        $user_id_role = new WP_User($user_id);
        $user_id_role->set_role($role);
        echo "User Created Successfully";
        exit();
    }else{
        
        print_r($error);
        
    }
}
?>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtUsername">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtEmail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="txtPassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="txtConfirmPassword">
  </div>

  <div class="form-group">
    <select class="form-control" name="txtrole" id="role">
        <option selected="selected" value="subscriber">Subscriber</option>
        <option value="contributor">Contributor</option>
        <option value="author">Author</option>
        <option value="editor">Editor</option>
        <option value="administrator">Administrator</option>
        <option value="">— No role for this site —</option>
    </select>
  </div>
  <button type="submit" name="btnSubmit"class="btn btn-primary">Submit</button>
</form>
<?php
get_footer();
?>

