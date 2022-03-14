<?
/*
Template Name: Custom Login Page
*/
get_header();
global $user_ID;
global $wpdb;
if (!$user_ID){
    if($_POST){
        $username = $wpdb->escape($_POST['txtUsername']);
        $password = $wpdb->escape($_POST['txtPassword']);

        $login_array = array();
        $login_array['user_login'] = $username;
        $login_array['user_password'] = $password;
        $verify_user = wp_signon($login_array, true);
        if(!is_wp_error($verify_user)){
            echo "<script>window.location = '".site_url()."'</script>";
        }else{
            echo "<p>Invalid credentials</p>";
        }
    }
    else{
        ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="txtUsername">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="txtPassword">
            </div>
            <button type="submit" name="btnSubmit"class="btn btn-primary">Submit</button>
    </form>
        <?
    }
    ?>

    <?
}
else{

}
?>
<?
get_footer();
?>