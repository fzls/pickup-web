/**
 * Created by Chen on 2016-12-09.
 */
function util_get_userinfo_from_localstorage() {
    let user = JSON.parse(window.localStorage.getItem(AUTH_USER_INFO_LOCAL_STORAGE_KEY));
    if (user !== null && user !== 'null') {
        return user;
    }
}