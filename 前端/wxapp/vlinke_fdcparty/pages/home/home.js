var a = function(a) {
    return a && a.__esModule ? a : {
        default: a
    };
}(require("../../util/request.js")), t = getApp();

Page({
    data: {
        param: [],
        wxapphomenavrpx: 1,
        user: [],
        currentTab: 0,
        tabwidth: 1
    },
    getData: function() {
        var t = this, e = t.data.param.openhome, n = null == t.data.user ? 0 : t.data.user.id, r = null == t.data.user ? 0 : t.data.user.branchid;
        a.default.get("home", {
            op: "getdata",
            openhome: e,
            userid: n,
            branchid: r
        }).then(function(a) {
            t.setData({
                slide: a.slide,
                article: a.article,
                notice: a.notice,
                edulesson: a.edulesson,
                activity: a.activity,
                seritem: a.seritem,
                exapaper: a.exapaper
            });
        }, function(a) {
            wx.showModal({
                title: "提示",
                content: a,
                showCancel: !1,
                success: function(a) {
                    a.confirm && wx.reLaunch({
                        url: "../login/login"
                    });
                }
            }), console.log(a);
        });
    },
    onLoad: function(e) {
        var n = this;
        a.default.get("attachurl").then(function(a) {
            wx.setStorageSync("attachurl", a), n.setData({
                attachurl: a
            });
        }), a.default.get("home").then(function(a) {
            wx.setStorageSync("param", a.param), wx.setStorageSync("user", a.user), n.setData({
                param: a.param,
                user: null == a.user ? null : a.user,
                wxapphomenavrpx: 750 / a.param.wxapphomenav.number,
                tabwidth: 750 / a.param.wxapphomecon.length
            }), n.getData(), wx.setNavigationBarTitle({
                title: a.param.title
            }), t.tabBar = JSON.parse(a.param.wxappfootnav), t.util.footer(n);
        }, function(a) {
            wx.showModal({
                title: "提示",
                content: a,
                showCancel: !1,
                success: function(a) {
                    a.confirm && wx.reLaunch({
                        url: "home"
                    });
                }
            }), console.log(a);
        });
    },
    clickTab: function(a) {
        var t = this;
        if (this.data.currentTab === a.target.dataset.current) return !1;
        t.setData({
            currentTab: a.target.dataset.current
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {
        var a = this;
        return {
            title: a.data.param.wxappsharetitle,
            path: "/vlinke_fdcparty/pages/home/home",
            imageUrl: a.data.param.wxappshareimageurl
        };
    }
});