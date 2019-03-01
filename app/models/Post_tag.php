<?php 

require_once APP_ROOT . 'models/Tags.php';

class Post_tag extends Model {
    public function __construct () {
        parent::__construct();
    }

    public function savePostTag ($formData) {
        // Create Tags class reference to get tags List
        $tags = new Tags();
        $post_tags = $tags->getTags();
        
        // echo '<br> 1';
        // var_dump($post_tags);
        // echo '<br>';
        // echo '<br> 2';

        $postId = session('InsertedPostId');
        // var_dump($postId);
        // echo '<br>';
        // echo '<br> 3';

        foreach ($formData as $formKey => $formValue) {
            // var_dump($fieldValue);
            // echo '<br>';
            // echo '<br> 4';

            foreach ($post_tags as $tag) {
                if ($tag->tag_name == $formKey) {
                    $this->post_id = $postId;
                    $this->tag_id = $formValue;
                    $result = $this->save();
                }
            }
        }
        session_end('InsertedPostId');
    }
}