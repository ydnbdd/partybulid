var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("../../util/request.js")), t = getApp();

Page({
    data: {
        pindex: 1,
        psize: 20,
        hasMore: !0,
        list: []
    },
    createAnswer: function(t) {
        var a = this, n = t.currentTarget.dataset.id, i = a.data.user.id;
        e.default.get("exapaper", {
            op: "create",
            id: n,
            userid: i
        }).then(function(e) {
            wx.navigateTo({
                url: "../exa/exaanswerdetails?id=" + e.exaanswerid
            });
        }, function(e) {
            wx.showModal({
                title: "提示信息",
                content: e,
                showCancel: !1,
                success: function(e) {}
            });
        });
    },
    getMore: function() {
        var t = this;
        wx.showToast({
            title: "加载中",
            icon: "loading"
        });
        var a = t.data.user.id, n = t.data.pindex, i = t.data.psize;
        e.default.get("exapaper", {
            op: "getmore",
            userid: a,
            pindex: n,
            psize: i
        }).then(function(e) {
            var a = t.data.list;
            1 == t.data.pindex && (a = []);
            var n = e;
            n.length < t.data.psize ? t.setData({
                list: a.concat(n),
                hasMore: !1
            }) : t.setData({
                list: a.concat(n),
                hasMore: !0,
                pindex: t.data.pindex + 1
            }), wx.hideToast();
        });
    },
    onLoad: function(e) {
        var t = this, a = wx.getStorageSync("param") || null, n = wx.getStorageSync("user") || null;
        t.setData({
            param: a,
            user: n
        }), null == n && wx.redirectTo({
            url: "../login/login"
        }), t.getMore();
    },
    onReady: function() {
        t.util.footer(this);
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
        var e = this;
        return {
            title: e.data.param.wxappsharetitle,
            path: "/vlinke_fdcparty/pages/home/home",
            imageUrl: e.data.param.wxappshareimageurl
        };
    }
});