var t, e, a = function(t) {
    return t && t.__esModule ? t : {
        default: t
    };
}(require("../../util/request.js")), n = getApp();

Page({
    data: {
        id: 0,
        uzan: 0,
        ucollect: 0,
        replypost: !0,
        replydetails: "",
        windowWidth: wx.getSystemInfoSync().windowWidth
    },
    touchstart: function(e) {
        t = e.changedTouches[0].clientX;
    },
    touchend: function(a) {
        (e = a.changedTouches[0].clientX) - t > 120 ? this.setData({
            display: "block",
            translate: "transform: translateX(" + .7 * this.data.windowWidth + "px); position: fixed; z-index: 1;"
        }) : t - e > 0 && this.setData({
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
    clickCollect: function(t) {
        var e = this, n = e.data.id, i = e.data.user.id;
        a.default.get("bbstopic", {
            op: "clickcollect",
            id: n,
            userid: i
        }).then(function(t) {
            e.setData({
                ucollect: t.ucollect
            });
        });
    },
    clickZan: function(t) {
        var e = this, n = e.data.id, i = e.data.user.id;
        a.default.get("bbstopic", {
            op: "clickzan",
            id: n,
            userid: i
        }).then(function(t) {
            e.setData({
                zanarr: t.zanarr,
                zantol: t.zantol,
                uzan: t.uzan
            });
        });
    },
    clickReply: function(t) {
        this.setData({
            replypost: !1
        });
    },
    replyClose: function(t) {
        this.setData({
            replypost: !0
        });
    },
    replyPost: function(t) {
        var e = this, n = e.data.id, i = e.data.user.id, o = t.detail.value.details;
        a.default.get("bbstopic", {
            op: "replypost",
            id: n,
            userid: i,
            details: o
        }).then(function(t) {
            e.setData({
                replypost: !0,
                replydetails: "",
                replyarr: t.replyarr,
                replytol: t.replytol
            });
        }, function(t) {
            wx.showModal({
                title: "提示信息",
                content: t,
                showCancel: !1,
                success: function(t) {}
            });
        });
    },
    replyDelete: function(t) {
        var e = this, n = e.data.user.id, i = t.currentTarget.dataset.replyid;
        a.default.get("bbstopic", {
            op: "replydelete",
            userid: n,
            replyid: i
        }).then(function(t) {
            e.setData({
                replyarr: t.replyarr,
                replytol: t.replytol
            });
        }, function(t) {
            wx.showModal({
                title: "提示信息",
                content: t,
                showCancel: !1,
                success: function(t) {}
            });
        });
    },
    onLoad: function(t) {
        var e = this, n = wx.getStorageSync("param") || null, i = wx.getStorageSync("user") || null;
        e.setData({
            param: n,
            user: i
        }), null == i && wx.redirectTo({
            url: "../login/login"
        });
        var o = parseInt(t.id);
        e.setData({
            id: o
        });
        var l = i.id;
        a.default.get("bbstopic", {
            id: o,
            userid: l
        }).then(function(t) {
            e.setData({
                topic: t.topic,
                zanarr: t.zanarr,
                zantol: t.zantol,
                uzan: t.uzan,
                replyarr: t.replyarr,
                replytol: t.replytol,
                ucollect: t.ucollect
            });
        }, function(t) {
            wx.showModal({
                title: "提示信息",
                content: t,
                showCancel: !1,
                success: function(t) {
                    t.confirm && wx.redirectTo({
                        url: "../bbs/bbshome"
                    });
                }
            });
        });
    },
    onReady: function() {
        n.util.footer(this);
    },
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {
        var t = this;
        return {
            title: t.data.param.wxappsharetitle,
            path: "/vlinke_fdcparty/pages/home/home",
            imageUrl: t.data.param.wxappshareimageurl
        };
    }
});