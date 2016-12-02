/**
 * Created by Chen on 2016-12-02.
 */
const AUTH_BASE_URL = 'http://chenji-meow.cn:9898';

const AUTH_CLIENT_ID     = '4';
const AUTH_CLIENT_SECRET = 'pHbmanIiDWeg4lldl6eRLXL9mGE5Kr2EtrtvBXc2';


const AUTH_WEB_SERVER    = 'http://localhost:777';

const AUTH_REDIRECT_PATH = '/oauth/redirect';
const AUTH_REDIRECT_URI  = `${AUTH_WEB_SERVER}${AUTH_REDIRECT_PATH}`;

const AUTH_CALLBACK_PATH = '/oauth/callback';
const AUTH_CALLBACK_URI  = `${AUTH_WEB_SERVER}${AUTH_CALLBACK_PATH}`;

const AUTH_AUTHORIZE_URL = `${AUTH_BASE_URL}/oauth/authorize`;
const AUTH_RESPONSE_TYPE = 'code';
const AUTH_SCOPE         = '';
const AUTH_GRANT_TYPE      = 'authorization_code';

const AUTH_ISSUE_TOKEN_URL = `${AUTH_BASE_URL}/oauth/token`;

const AUTH_TOKEN_LOCAL_STORAGE_KEY ='__oauth_token';