<?php

class HouseData
{
    private string $metaKey;

    public function __construct(string $metaKey)
    {
        $this->metaKey = $metaKey;
        $this->register();
    }

    public function register()
    {
        add_action('add_meta_boxes', [$this, 'wpheticAddMetaBox']);
        add_action('save_post', [$this, 'wpheticMetaBoxSave']);
    }

    public function wpheticAddMetaBox()
    {
        add_meta_box(
            'prix',
            'prix',
            [$this, 'wpheticMetaBoxRender'],
            'post',
            'side',

        );
    }

    public function wpheticMetaBoxRender($post)
    {
        $value = (get_post_meta($post->ID, $this->metaKey, true));
        ?>
        <input type="text" value="true" name="prix" id="prix" placeholder="<?$value?>"/>
        <label for="prix">valeur du bien ?</label>
        <?php
    }

    public function wpheticMetaBoxSave(int $post_ID)
    {
        if (isset($_POST['prix']) && $_POST['prix'] === 'true') {
            update_post_meta($post_ID, $this->metaKey, $_POST['prix']);
        } else {
            delete_post_meta($post_ID, $this->metaKey);
        }

    }
}
