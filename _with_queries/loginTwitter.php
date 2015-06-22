<?php
$mail = isset($_GET['c'])?trim($_GET['c']):'';

if(!empty($mail)){
    session_start();
    require_once('../services/twitteroauth/twitteroauth.php');
    require_once('../services/twitteroauth/configTwitter.php');

    $_SESSION['tt_mail'] = $mail;

    /* Build TwitterOAuth object with client credentials. */
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

    /* Get temporary credentials. */
    $request_token = $connection->getRequestToken(OAUTH_CALLBACK);

    /* Save temporary credentials to session. */
    $_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    /* If last connection failed don't display authorization link. */
    switch ($connection->http_code) {
        case 200:
            /* Build authorize URL and redirect user to Twitter. */
            $url = $connection->getAuthorizeURL($token);
            header('Location: ' . $url);
            break;
        default:
            header('Location: /?twitterlogin=false');
    }
}else{
    header('Location: /?twitterlogin=mail');
}
?>