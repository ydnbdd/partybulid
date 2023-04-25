var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("../../util/request.js")), a = getApp();

Page({
    data: {},
    onLoad: function(a) {
        var t = this, n = wx.getStorageSync("param") || null, o = wx.getStorageSync("user") || null;
        t.setData({
            param: n,
            user: o
        }), null == o && wx.redirectTo({
            url: "../login/login"
        });
        var r = o.id;
        e.default.get("exahome", {
            userid: r
        }).then(function(e) {
            t.setData({
                exaanswer: e.exaanswer,
                exapaperall: e.exapaperall,
                exadayall: e.exadayall,
                slide: e.slide
            });
        }, function(e) {
            wx.showModal({
                title: "提示信息",
                content: e,
                showCancel: !1,
                success: function(e) {
                    e.confirm && wx.redirectTo({
                        url: "../home/home"
                    });
                }
            });
        });
    },
    onReady: function() {
        a.util.footer(this);
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