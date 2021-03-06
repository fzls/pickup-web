/**
 * Created by Chen on 2016-12-02.
 */


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

/*RE: 在oauth服务器添加该接口，get为表单，post为修改密码*/
const AUTH_CHANGE_PASSWORD = `${AUTH_BASE_URL}/password/change`;

const AUTH_TOKEN_LOCAL_STORAGE_KEY ='pickup_oauth_token';
const AUTH_USER_INFO_LOCAL_STORAGE_KEY = 'pickup_user_info';
const AUTH_USER_STATUS_LOCAL_STORAGE_KEY = 'pickup_user_status';