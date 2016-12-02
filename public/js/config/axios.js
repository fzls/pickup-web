/**
 * Created by Chen on 2016-12-02.
 */
/*配置axios*/
axios.defaults.baseURL = API_BASE_URL;

// Add a request interceptor
axios.interceptors.request.use(function (config) {
        /*如果不是oauth认证相关的的url*/
        if (window.location.pathname.indexOf(AUTH_CALLBACK_PATH) === -1 && window.location.pathname.indexOf(AUTH_REDIRECT_PATH) === -1) {
            /*试图从本地存储中获取认证token*/
            const token = window.localStorage.getItem(AUTH_TOKEN_LOCAL_STORAGE_KEY);
            if (token) {
                /*如果token存在，由于我们的token是无时长限制的，所以无需检验是否过期，直接设置axios的bearer认证的header*/
                config.headers.common['Authorization'] = `Bearer ${token}`;
            } else {
                // 否则，重定向到登陆界面
                alert_dialog("主人还没登陆过呢");
                window.location.replace(AUTH_REDIRECT_URI);
            }
        }
        return config;
    }
    ,
    function (error) {
        // Do something with request error
        return Promise.reject(error);
    }
);

// Add a response interceptor
axios.interceptors.response.use(function (response) {
    /*如果正常从api服务器返回数据，则根据返回数据中的meta信息决定是否需要做额外处理*/
    if (response.status === 200 && response.request.responseURL.indexOf(API_BASE_URL) !== -1) {
        // 如果用户未注册本应用，则将让其注册应用(即添加相应信息）
        if (response.data.meta.code === 411) {
            window.location.replace(URL_REGISTER);
        }
        // 如果meta显示请求出现问题，则发出警告
        if (response.data.meta.code < 200 || response.data.meta.code >= 400) {
            alert_dialog(response.data);
            window.console.log(response.data);
        }
    }
    return response;
}, function (error) {
    // Do something with response error
    return Promise.reject(error);
});