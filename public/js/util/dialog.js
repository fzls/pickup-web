/**
 * Created by Chen on 2016-12-02.
 */
const alert_dialog = function (message) {
    BootstrapDialog.alert({
        type   : BootstrapDialog.TYPE_DANGER,
        title  : '好像出错了呢~',
        message: `<pre>${JSON.stringify(message, null, 4)}</pre>`,
    });
};

const info_dialog = function (message, title = '标题是什么，可以吃吗') {
    BootstrapDialog.alert({
        type   : BootstrapDialog.TYPE_INFO,
        title  : title,
        message: JSON.stringify(message, null, 4),
    });
};

const success_dialog = function (message, title = '标题是什么，可以吃吗') {
    BootstrapDialog.alert({
        type   : BootstrapDialog.TYPE_SUCCESS,
        title  : title,
        message: JSON.stringify(message, null, 4),
    });
};