<?php
if(is_front_page()){
    get_template_part('front/components/header');
}else{
    get_template_part('front/components/pages-header');
}
?>