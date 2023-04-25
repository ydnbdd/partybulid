var t, a, e = function(t) {
    return t && t.__esModule ? t : {
        default: t
    };
}(require("../../util/request.js")), n = getApp();

Page({
    data: {
        pindex: 1,
        psize: 20,
        hasMore: !0,
        list: [],
        windowWidth: wx.getSystemInfoSync().windowWidth
    },
    touchstart: function(a) {
        t = a.changedTouches[0].clientX;
    },
    touchend: function(e) {
        (a = e.changedTouches[0].clientX) - t > 120 ? this.setData({
            display: "block",
            translate: "transform: translateX(" + .7 * this.data.windowWidth + "px); position: fixed; z-index: 1;"
        }) : t - a > 0 && this.setData({
            display: "none",
            translate: ""
        });
    },
    showview: function() {
        this.setData({
            display: "block",
            translate: "transform: translateX(" + .7 * this.data.windowWidth + "px); position: fixed; z-index: 1;"
        });
    },
    hideview: function() {
        this.setData({
            display: "none",
            translate: ""
        });
    },
    getMore: function() {
        var t = this, a = t.data.op, n = t.data.user.id, i = t.data.pindex, o = t.data.psize;
        e.default.get("bbsmy", {
            op: a,
            userid: n,
            pindex: i,
            psize: o
        }).then(function(a) {
            var e = t.data.list;
            1 == t.data.pindex && (e = []);
            var n = a;
            n.length < t.data.psize ? t.setData({
                list: e.concat(n),
                hasMore: !1
            }) : t.setData({
                list: e.concat(n),
                hasMore: !0,
                pindex: t.data.pindex + 1
            });
        });
    },
    onLoad: function(t) {
        var a = this, e = wx.getStorageSync("param") || null, n = wx.getStorageSync("user") || null;
        a.setData({
            param: e,
            user: n
        }), null == n && wx.redirectTo({
            url: "../login/login"
        });
        var i = t.op;
        a.setData({
            op: i
        }), a.getMore();
    },
    onReady: function() {
        n.util.footer(this);
    },
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.data.pindex = 1, this.getMore();
    },
    onReachBottom: function() {
        this.data.hasMore ? this.getMore() : wx.showToast({
            title: "没有更多数据"
        });
    },
    onShareAppMessage: function() {
        var t = this;
        return {
            title: t.data.param.wxappsharetitle,
            path: "/vlinke_fdcparty/pages/home/home",
            imageUrl: t.data.param.wxappshareimageurl
        };
    }
});