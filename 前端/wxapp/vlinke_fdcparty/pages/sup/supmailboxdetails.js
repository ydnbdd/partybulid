var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("../../util/request.js")), t = getApp();

Page({
    data: {},
    onLoad: function(t) {
        var a = this, n = wx.getStorageSync("param") || null, o = wx.getStorageSync("user") || null;
        null == o && wx.redirectTo({
            url: "../login/login"
        }), a.setData({
            param: n,
            user: o
        });
        var u = t.id, i = a.data.user.id;
        e.default.get("supmailbox", {
            id: u,
            op: "details",
            userid: i
        }).then(function(e) {
            a.setData({
                supmailbox: e.supmailbox,
                luser: e.luser
            });
        }, function(e) {
            wx.showModal({
                title: "提示信息",
                content: e,
                showCancel: !1,
                success: function(e) {
                    e.confirm && wx.redirectTo({
                        url: "../sup/supmailbox"
                    });
                }
            }), console.log(e);
        });
    },
    onReady: function() {
        t.util.footer(this);
    },
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {
        var e = this;
        return {
            title: e.data.param.wxappsharetitle,
            path: "/vlinke_fdcparty/pages/home/home",
            imageUrl: e.data.param.wxappshareimageurl
        };
    }
});