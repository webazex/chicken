<?php
get_header();
switch (get_post_type()){
    case "products":
        get_template_part('front/catalog/products', '', $data);
        break;
}

get_footer();
