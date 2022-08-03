<?php
//remove all gutenberg
add_filter("use_block_editor_for_post_type", "disableGutenberg");
function disableGutenberg()
{
    return false;
}