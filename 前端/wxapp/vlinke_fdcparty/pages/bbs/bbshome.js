var t, e, a = function(t) {
    return t && t.__esModule ? t : {
        default: t
    };
}(require("../../util/request.js")), i = getApp();

Page({
    data: {
        cateid: 0,
        pindex: 1,
        psize: 20,
        hasMore: !0,
        list: [],
        replyid: 0,
        replytitle: "",
        replydetails: "",
        topicindex: 0,
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
    getMore: function() {
        var t = this, e = t.data.user.id, i = t.data.user.scort, n = t.data.cateid, s = t.data.pindex, r = t.data.psize;
        a.default.get("bbshome", {
            op: "getmore",
            userid: e,
            userscort: i,
            cateid: n,
            pindex: s,
            psize: r
        }).then(function(e) {
            var a = t.data.list;
            1 == t.data.pindex && (a = []);
            var i = e;
            i.length < t.data.psize ? t.setData({
                list: a.concat(i),
                hasMore: !1
            }) : t.setData({
                list: a.concat(i),
                hasMore: !0,
                pindex: t.data.pindex + 1
            });
        });
    },
    previewImage: function(t) {
        var e = this, a = t.target.dataset.messageid, i = t.target.dataset.src;
        wx.previewImage({
            current: i,
            urls: e.data.list[a].picall
        });
    },
    showMore: function(t) {
        var e = this, a = t.target.dataset.index, i = t.target.dataset.hidden, n = e.data.list;
        n[a].ishidden = "true" == i, e.setData({
            list: n
        });
    },
    clickCollect: function(t) {
        var e = this, i = e.data.user.id, n = t.currentTarget.dataset.index, s = e.data.list, r = s[n].id;
        a.default.get("bbshome", {
            op: "clickcollect",
            userid: i,
            topicid: r
        }).then(function(t) {
            s[n].ucollect = t.collectid, e.setData({
                list: s
            });
        });
    },
    clickZan: function(t) {
        var e = this, i = e.data.user.id, n = t.currentTarget.dataset.index, s = e.data.list, r = s[n].id;
        a.default.get("bbshome", {
            op: "clickzan",
            userid: i,
            topicid: r
        }).then(function(t) {
            s[n].zantol = t.tol, s[n].zanarr = t.arr, s[n].uzan = t.zanid, e.setData({
                list: s
            });
        });
    },
    clickReply: function(t) {
        var e = this, a = t.currentTarget.dataset.index, i = t.currentTarget.dataset.replytitle, n = e.data.list[a].id;
        e.setData({
            replyid: n,
            replytitle: i,
            topicindex: a
        });
    },
    replyClose: function(t) {
        this.setData({
            replyid: 0,
            replytitle: "",
            replydetails: "",
            topicindex: 0
        });
    },
    replyPost: function(t) {
        var e = this, i = e.data.user.id, n = e.data.replyid, s = t.detail.value.details, r = e.data.topicindex, o = e.data.list;
        a.default.get("bbshome", {
            op: "replypost",
            userid: i,
            topicid: n,
            details: s
        }).then(function(t) {
            o[r].replytol = t.tol, o[r].replyarr = t.arr, e.setData({
                list: o,
                replyid: 0,
                replytitle: "",
                replydetails: ""
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
        var e = this, i = e.data.user.id, n = t.currentTarget.dataset.replyid, s = t.currentTarget.dataset.index, r = e.data.list;
        a.default.get("bbshome", {
            op: "replydelete",
            userid: i,
            replyid: n
        }).then(function(t) {
            r[s].replytol = t.tol, r[s].replyarr = t.arr, e.setData({
                list: r
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
        var e = this, i = wx.getStorageSync("param") || null, n = wx.getStorageSync("user") || null;
        e.setData({
            param: i,
            user: n
        }), null == n && wx.redirectTo({
            url: "../login/login"
        });
        var s = parseInt(t.cateid);
        e.setData({
            cateid: s
        }), a.default.get("bbshome", {
            cateid: s
        }).then(function(t) {
            e.setData({
                catename: t.catename
            }), e.getMore();
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
        i.util.footer(this);
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