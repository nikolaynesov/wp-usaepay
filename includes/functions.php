<?php

/**
 * @return bool
 */
function usaepay_get_key() {

        $data =  get_option( 'usaepay_settings' );

        return (empty($data || !isset($data['key']))) ? false : $data['key'];

    }

/**
 * @return bool
 */
function usaepay_get_sandbox() {

        $data =  get_option( 'usaepay_settings' );

        return (empty($data || !isset($data['sandbox']))) ? false : $data['sandbox'];

    }