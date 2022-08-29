<?php
function __getAdjacentPostWithCurrent($direction = 'next', $type = 'post', $current) {

    // Get all posts with this custom post type
    $posts = get_posts('posts_per_page=-1&order=DESC&post_type='.$type);

    $postsLength = sizeof($posts)-1;
    $currentIndex = 0;
    $index = 0;
    $result = 0;

    // Iterate all posts in order to find the current one
    foreach($posts as $p){
        if($p->ID == $current) $currentIndex = $index;
        $index++;
    }
    if($direction == 'prev') {
        // If it's 'prev' return the previous one unless it's the first one, in this case return the last.
        $result = !$currentIndex ? $posts[$postsLength]->ID : $posts[$currentIndex - 1]->ID;
    } else {
        // If it's 'next' return the next one unless it's the last one, in this case return the first.
        $result = $currentIndex == $postsLength ? $posts[0]->ID : $posts[$currentIndex + 1]->ID;
    }
    return $result;
}
function __getCustomAdjacentPosts( $in_same_term = false, $excluded_terms = '', $previous = true, $taxonomy = 'category', int $count = 1) {
    global $wpdb;

    $post = get_post();
    if ( ! $post || ! taxonomy_exists( $taxonomy ) ) {
        return null;
    }

    $current_post_date = $post->post_date;

    $join     = '';
    $where    = '';
    $adjacent = $previous ? 'previous' : 'next';

    if ( ! empty( $excluded_terms ) && ! is_array( $excluded_terms ) ) {
        // Back-compat, $excluded_terms used to be $excluded_categories with IDs separated by " and ".
        if ( false !== strpos( $excluded_terms, ' and ' ) ) {
            _deprecated_argument(
                __FUNCTION__,
                '3.3.0',
                sprintf(
                /* translators: %s: The word 'and'. */
                    __( 'Use commas instead of %s to separate excluded terms.' ),
                    "'and'"
                )
            );
            $excluded_terms = explode( ' and ', $excluded_terms );
        } else {
            $excluded_terms = explode( ',', $excluded_terms );
        }

        $excluded_terms = array_map( 'intval', $excluded_terms );
    }

    /**
     * Filters the IDs of terms excluded from adjacent post queries.
     *
     * The dynamic portion of the hook name, `$adjacent`, refers to the type
     * of adjacency, 'next' or 'previous'.
     *
     * Possible hook names include:
     *
     *  - `get_next_post_excluded_terms`
     *  - `get_previous_post_excluded_terms`
     *
     * @since 4.4.0
     *
     * @param array|string $excluded_terms Array of excluded term IDs. Empty string if none were provided.
     */
    $excluded_terms = apply_filters( "get_{$adjacent}_post_excluded_terms", $excluded_terms );

    if ( $in_same_term || ! empty( $excluded_terms ) ) {
        if ( $in_same_term ) {
            $join  .= " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";
            $where .= $wpdb->prepare( 'AND tt.taxonomy = %s', $taxonomy );

            if ( ! is_object_in_taxonomy( $post->post_type, $taxonomy ) ) {
                return '';
            }
            $term_array = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

            // Remove any exclusions from the term array to include.
            $term_array = array_diff( $term_array, (array) $excluded_terms );
            $term_array = array_map( 'intval', $term_array );

            if ( ! $term_array || is_wp_error( $term_array ) ) {
                return '';
            }

            $where .= ' AND tt.term_id IN (' . implode( ',', $term_array ) . ')';
        }

        if ( ! empty( $excluded_terms ) ) {
            $where .= " AND p.ID NOT IN ( SELECT tr.object_id FROM $wpdb->term_relationships tr LEFT JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id) WHERE tt.term_id IN (" . implode( ',', array_map( 'intval', $excluded_terms ) ) . ') )';
        }
    }

    // 'post_status' clause depends on the current user.
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();

        $post_type_object = get_post_type_object( $post->post_type );
        if ( empty( $post_type_object ) ) {
            $post_type_cap    = $post->post_type;
            $read_private_cap = 'read_private_' . $post_type_cap . 's';
        } else {
            $read_private_cap = $post_type_object->cap->read_private_posts;
        }

        /*
         * Results should include private posts belonging to the current user, or private posts where the
         * current user has the 'read_private_posts' cap.
         */
        $private_states = get_post_stati( array( 'private' => true ) );
        $where         .= " AND ( p.post_status = 'publish'";
        foreach ( $private_states as $state ) {
            if ( current_user_can( $read_private_cap ) ) {
                $where .= $wpdb->prepare( ' OR p.post_status = %s', $state );
            } else {
                $where .= $wpdb->prepare( ' OR (p.post_author = %d AND p.post_status = %s)', $user_id, $state );
            }
        }
        $where .= ' )';
    } else {
        $where .= " AND p.post_status = 'publish'";
    }

    $op    = $previous ? '<' : '>';
    $order = $previous ? 'DESC' : 'ASC';

    /**
     * Filters the JOIN clause in the SQL for an adjacent post query.
     *
     * The dynamic portion of the hook name, `$adjacent`, refers to the type
     * of adjacency, 'next' or 'previous'.
     *
     * Possible hook names include:
     *
     *  - `get_next_post_join`
     *  - `get_previous_post_join`
     *
     * @since 2.5.0
     * @since 4.4.0 Added the `$taxonomy` and `$post` parameters.
     *
     * @param string  $join           The JOIN clause in the SQL.
     * @param bool    $in_same_term   Whether post should be in a same taxonomy term.
     * @param array   $excluded_terms Array of excluded term IDs.
     * @param string  $taxonomy       Taxonomy. Used to identify the term used when `$in_same_term` is true.
     * @param WP_Post $post           WP_Post object.
     */
    $join = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_term, $excluded_terms, $taxonomy, $post );

    /**
     * Filters the WHERE clause in the SQL for an adjacent post query.
     *
     * The dynamic portion of the hook name, `$adjacent`, refers to the type
     * of adjacency, 'next' or 'previous'.
     *
     * Possible hook names include:
     *
     *  - `get_next_post_where`
     *  - `get_previous_post_where`
     *
     * @since 2.5.0
     * @since 4.4.0 Added the `$taxonomy` and `$post` parameters.
     *
     * @param string  $where          The `WHERE` clause in the SQL.
     * @param bool    $in_same_term   Whether post should be in a same taxonomy term.
     * @param array   $excluded_terms Array of excluded term IDs.
     * @param string  $taxonomy       Taxonomy. Used to identify the term used when `$in_same_term` is true.
     * @param WP_Post $post           WP_Post object.
     */
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare( "WHERE p.post_date $op %s AND p.post_type = %s $where", $current_post_date, $post->post_type ), $in_same_term, $excluded_terms, $taxonomy, $post );

    /**
     * Filters the ORDER BY clause in the SQL for an adjacent post query.
     *
     * The dynamic portion of the hook name, `$adjacent`, refers to the type
     * of adjacency, 'next' or 'previous'.
     *
     * Possible hook names include:
     *
     *  - `get_next_post_sort`
     *  - `get_previous_post_sort`
     *
     * @since 2.5.0
     * @since 4.4.0 Added the `$post` parameter.
     * @since 4.9.0 Added the `$order` parameter.
     *
     * @param string $order_by The `ORDER BY` clause in the SQL.
     * @param WP_Post $post    WP_Post object.
     * @param string  $order   Sort order. 'DESC' for previous post, 'ASC' for next.
     */
    $sort = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT $count", $post, $order );

    $query     = "SELECT p.ID FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5( $query );
    $result    = wp_cache_get( $query_key, 'counts' );
    if ( false !== $result ) {
        if ( $result ) {
            $result = get_post( $result );
        }
        return $result;
    }

    $result = $wpdb->get_results( $query );
    if ( null === $result ) {
        $result = '';
    }

    wp_cache_set( $query_key, $result, 'counts' );
    $returned = [];
    if ( is_array($result) ) {
        foreach ( $result as $item ) {
            array_push($returned, get_post($item->ID));
        }
    }
    return $returned;
}
function getRecentsPosts($tax):array{
    $returned = [];
    $prev_posts = __getCustomAdjacentPosts(false, '', true, $tax, 1);
    if(!empty($prev_posts)){
        foreach ($prev_posts as $prev_post){
            array_push($returned, $prev_post);
        }
        $next_posts = __getCustomAdjacentPosts(false, '', false, $tax, 2);
        switch (count($next_posts)){
            case 2:
                foreach ($next_posts as $next_post){
                    array_push($returned, $next_post);
                }
                break;
            case 1:
                foreach ($next_posts as $next_post){
                    array_push($returned, $next_post);
                }
                $prev_posts = __getCustomAdjacentPosts(false, '', true, $tax, 2);
                if(!empty($prev_posts[1])){
                    array_push($returned, $prev_posts[1]);
                }
                break;
            case 0:
                $prev_posts = __getCustomAdjacentPosts(false, '', true, $tax, 3);
                $returned = [];
                foreach ($prev_posts as $prev_post){
                    array_push($returned, $prev_post);
                }
                break;
            default:
                break;
        }
    }else {
        $next_posts = __getCustomAdjacentPosts(false, '', false, $tax, 3);
        if(!empty($next_posts)){
            foreach ($next_posts as $next_post){
                array_push($returned, $next_post);
            }
        }
    }
    return $returned;
}

function getRecentsProducts(){
    $data = getRecentsPosts('p-cats');
    if(!empty($data)){
        $posts = [];
        foreach ($data as $post){
            $dataPost = get_field('product-group', $post->ID);
            if(!empty($dataPost['conditions'])){
                $conditions = __fetchProperties($dataPost['conditions']);
            }else{
                $conditions = [];
            }
            if(!empty($dataPost['nutritional'])){
                $nutritional = __fetchProperties($dataPost['nutritional']);
            }else{
                $nutritional = [];
            }
            array_push($posts, [
                'id' => $post->ID,
                'title' => $dataPost['title'],
                'src' => $dataPost['image'],
                'sku' => $dataPost['sku'],
                'status' => $dataPost['product-status'],
                'conditions' => $conditions,
                'nutritional' => $nutritional,
            ]);
        }
    }else{
        $posts = [];
    }
    return $posts;
}

function getRecentsNap(){
    $data = getRecentsPosts('nap-tags');
    if(!empty($data)){
        $posts = [];
        foreach ($data as $post){
            $dataPost = get_field('nap-content', $post->ID);
            $cats = [];
            $terms = get_the_terms($post, 'nap-tags');
            if(!is_wp_error($terms) and ($terms !== false)){
                foreach ($terms as $termObj) {
                    array_push($cats, [
                        'id' => $termObj->term_id,
                        'name' => $termObj->name,
                        'slug' => $termObj->slug,
                        'count' => $termObj->count,
                    ]);
                }
            }
            array_push($posts, [
                'title' => $dataPost['title'],
                'image' => $dataPost['image'],
                'content' => $dataPost['content'],
                'cats' => $cats,
            ]);
        }
    }else{
        $posts = [];
    }
    return $posts;
}

function getRecentsReceipe(){
    $data = getRecentsPosts('ingridients');
    if(!empty($data)){
        $posts = [];
        foreach ($data as $post){
            $dataPost = get_field('receipt-content-group', $post->ID);
            $terms = get_the_terms($post->ID, 'r-tags');
            $tags = [];
            if($terms !== false and !is_wp_error($terms)){
                foreach ($terms as $term){
                    array_push($tags, $term->name);
                }
            }
            $posts[$post->ID]['date'] = get_the_date("d F Y", $post->ID);
            $posts[$post->ID]['tags'] = $tags;
            $posts[$post->ID]['id'] = $post->ID;
            if(!empty($dataPost['general-info'])){
                $generalInfo = $dataPost['general-info'];
                $posts[$post->ID]['title'] = $generalInfo['title'];
                $posts[$post->ID]['subtitle'] = $generalInfo['subtitle'];
                $posts[$post->ID]['image'] = $generalInfo['image'];

            }else{
                $posts[$post->ID]['title'] = '';
                $posts[$post->ID]['subtitle'] = '';
                $posts[$post->ID]['image'] = '';
            }
            if(!empty($dataPost['properties'])){
                $props = $dataPost['properties'];
                $posts[$post->ID]['desc'] = $dataPost['properties-desc'];
                $posts[$post->ID]['complexity'] = $props['complexity'];
                $posts[$post->ID]['time'] = $props['time'];
                $posts[$post->ID]['portioning'] = $props['portioning'];
            }else{
                $posts[$post->ID]['complexity'] = 1;
                $posts[$post->ID]['time'] = '';
                $posts[$post->ID]['portioning'] = '';
            }
            if(!empty($dataPost['first-i'])){
                $firstIngridient = $dataPost['first-i'];
                $term = get_term($firstIngridient['text-group']['name']);
                $posts[$post->ID]['first-i'] = [
                    'name' => $term->name
                ];
//                $posts[$post->ID]['notes'] = $ingridientsNotes;

            }else{
                $posts[$post->ID]['first-i'] = [];
                $posts[$post->ID]['notes'] = "";
            }
            if(!empty($dataPost['others-ingridients'])){
                $othersIngridients = $dataPost['others-ingridients'];
                $ingridients = [];
                foreach ($othersIngridients as $ingridient){
                    $oTerm = get_term($firstIngridient['text-group']['name']);
                    $image = get_field('ihgrid-data', $oTerm)['image'];
                    array_push($ingridients, [
                        'name' => $oTerm->name,
                        'count' => $ingridient['face'],
                        'src' => $image,
                    ]);
                }
                $posts[$post->ID]['others-i'] = $ingridients;
            }else{
                $posts[$post->ID]['others-i'] = [];
            }
            if(!empty($dataPost['receipt-content-group'])){
                $receipeGroup = $dataPost['receipt-content-group'];

                $posts[$post->ID]['file'] = $receipeGroup['file'];
                $posts[$post->ID]['receipe'] = $receipeGroup['receipe'];
            }else{
                $posts[$post->ID]['file'] = [];
                $posts[$post->ID]['receipe'] = "";
            }

            if(!empty($dataPost['nutritional-group'])){
                $nutritionalGroup = $dataPost['nutritional-group'];
                $posts[$post->ID]['info'] = $nutritionalGroup['info'];
                $posts[$post->ID]['short-info'] = $nutritionalGroup['short_info'];

            }else{
                $posts[$post->ID]['info'] = '';
                $posts[$post->ID]['short-info'] = [];
            }
        }

    }else{
        $posts = [];
    }
    return $posts;
}