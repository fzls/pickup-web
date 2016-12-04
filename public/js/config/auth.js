/**
 * Created by Chen on 2016-12-02.
 */
const AUTH_BASE_URL = 'http://chenji-meow.cn:9898';

/*localhost:777*/
// const AUTH_CLIENT_ID     = '5';
// const AUTH_CLIENT_SECRET = 'JZaXYvlHH0Pv9mxLWLmfszw80pr3R0rtylrery0Y';
// const AUTH_WEB_SERVER    = 'http://localhost:777';

/*localhost:3000 /browser-sync proxy*/
const AUTH_CLIENT_ID     = '6';
const AUTH_CLIENT_SECRET = '7WWHvRbvVtsTzJ98E7TA169RDzDLdQKQMAwMOrsW';
const AUTH_WEB_SERVER    = 'http://localhost:3000';

console.log('current web server is '+AUTH_WEB_SERVER);

const AUTH_REDIRECT_PATH = '/oauth/redirect';
const AUTH_REDIRECT_URI  = `${AUTH_WEB_SERVER}${AUTH_REDIRECT_PATH}`;

const AUTH_CALLBACK_PATH = '/oauth/callback';
const AUTH_CALLBACK_URI  = `${AUTH_WEB_SERVER}${AUTH_CALLBACK_PATH}`;

const AUTH_AUTHORIZE_URL = `${AUTH_BASE_URL}/oauth/authorize`;
const AUTH_RESPONSE_TYPE = 'code';
const AUTH_SCOPE         = '';
const AUTH_GRANT_TYPE      = 'authorization_code';

const AUTH_ISSUE_TOKEN_URL = `${AUTH_BASE_URL}/oauth/token`;

const AUTH_TOKEN_LOCAL_STORAGE_KEY ='pickup_oauth_token';
const AUTH_USER_INFO_LOCAL_STORAGE_KEY = 'pickup_user_info';