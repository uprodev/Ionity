<?php

get_header();

global $post;

$slug = $post->post_name;

?>

    <div class="page-inner">
        <div class="block-map">
            <div class="container-fluid">
                <div class="block-header">
                    <h1><?php the_title();?></h1>
                    <div class="map-list">
                        <div class="dropdown">
                            <button class="drop-trigger">
                                <?= __('Choose your city', 'ionity');?>
                                <span class="icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.53334 9.53332L5.80001 7.79999C5.5889 7.58888 5.54179 7.34732 5.65867 7.07532C5.77512 6.80288 5.98334 6.66666 6.28334 6.66666H9.71667C10.0167 6.66666 10.2249 6.80288 10.3413 7.07532C10.4582 7.34732 10.4111 7.58888 10.2 7.79999L8.46667 9.53332C8.40001 9.59999 8.32779 9.64999 8.25001 9.68332C8.17223 9.71666 8.0889 9.73332 8.00001 9.73332C7.91112 9.73332 7.82779 9.71666 7.75001 9.68332C7.67223 9.64999 7.60001 9.59999 7.53334 9.53332Z" fill="#969696" />
                        </svg>
                      </span>
                            </button>
                            <div class="drop-list">
                                <input id="searchCity" type="text" placeholder="Enter your city" />
                                <ul id="cityList"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="map" data-city="<?= $slug;?>"></div>
            </div>
        </div>
    </div>

<?php
get_template_part('parts/mapjs');
get_template_part('parts/contacts');

get_footer();
