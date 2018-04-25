<?php

function flashMessage($infos, $message) {

    if (isset($_SESSION['flash']['infos']) && isset($_SESSION['flash']['message'])) {
        $html  = '<div class="flashMessage mx-auto">';
        $html .= '<div class="text-center alert alert-' . $infos .'" role="alert">';
        $html .= '<p>' . $message . '</p>';
        $html .= '</div></div>';

        return $html;
    }

}