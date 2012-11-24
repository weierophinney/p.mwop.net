<?php
$settings = array(
    /**
     * User Provider Entity Class
     *
     * Name of Entity class to use. Useful for using your own entity class
     * instead of the default one provided. Default is ScnSocialAuth\Entity\UserProvider.
     */
    'user_provider_entity_class' => 'ScnSocialAuth\Entity\UserProvider',

    /**
     * Facebook Enabled
     *
     * Please specify if Facebook is enabled
     */
    'facebook_enabled' => false,

    /**
     * Foursquare Enabled
     *
     * Please specify if Foursquare is enabled
     */
    'foursquare_enabled' => false,

    /**
     * Github Enabled
     *
     * Please specify if Github is enabled
     *
     * You can register a new application at:
     * https://github.com/settings/applications/new
     */
    'github_enabled' => true,

    /**
     * Github Scope
     *
     * Please specify a Github scope
     *
     * A comma-separated list of permissions you want to request from the user.
     * See he Github docs for a full list of the available permissions:
     * http://developer.github.com/v3/oauth/#scopes
     *
     * No scope == read-only access
     */
    'github_scope' => '',

    /**
     * Google Enabled
     *
     * Please specify if Google is enabled
     */
    'google_enabled' => true,

    /**
     * Google Scope
     *
     * Please specify a Google scope
     *
     * A space-separated list of permissions you want to request from the user.
     * See the Google docs for a full list of available permissions:
     * https://developers.google.com/accounts/docs/OAuth2Login#scopeparameter.
     */
    'google_scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',

    /**
     * LinkedIn Enabled
     *
     * Please specify if LinkedIn is enabled
     */
    'linkedIn_enabled' => false,

    /**
     * Twitter Enabled
     *
     * Please specify if Twitter is enabled
     */
    'twitter_enabled' => true,

    /**
     * Yahoo! Enabled
     *
     * Please specify if Yahoo! is enabled
     */
    'yahoo_enabled' => false,

    /**
     * Set to true if you want to display only the social login buttons without
     * the username/password etc. from ZfcUser.
     */
    'social_login_only' => true,

    /**
     *  The home route key as used in your application
     */
    'home_route' => 'phly-paste',

    /**
     * End of ScnSocialAuth configuration
     */
);

/**
 * You do not need to edit below this line
 */
return array(
    'scn-social-auth' => $settings,
    'service_manager' => array(
        'aliases' => array(
            'ScnSocialAuth_ZendDbAdapter' => (isset($settings['zend_db_adapter'])) ? $settings['zend_db_adapter']: 'Zend\Db\Adapter\Adapter',
            'ScnSocialAuth_ZendSessionManager' => (isset($settings['zend_session_manager'])) ? $settings['zend_session_manager']: 'Zend\Session\SessionManager',
        ),
    ),
);
