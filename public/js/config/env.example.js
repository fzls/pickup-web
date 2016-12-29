/**
 * Created by Chen on 2016-12-12.
 */

//*********** Step 1 : 将下面两个url中的localhost修改为你的服务器的实际ip或域名***********
const API_BASE_URL = 'http://localhost:2333/api/v1';
const AUTH_BASE_URL = 'http://localhost:9899';

//*********** Step 2 : 在认证服务器的主页去申请一个客户端（点击Create New Client，name任意，Redirect URL为http://YOUR_HOST_IP:666/oauth/callback），并将Client ID，Secret分别填入下方，并将AUTH_WEB_SERVER中的localhost改为实际服务器的ip或域名***********
const AUTH_CLIENT_ID     = '5';
const AUTH_CLIENT_SECRET = 'JZaXYvlHH0Pv9mxLWLmfszw80pr3R0rtylrery0Y';
const AUTH_WEB_SERVER    = 'http://localhost:666';
