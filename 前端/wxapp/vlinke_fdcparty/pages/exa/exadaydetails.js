var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("../../util/request.js")), t = getApp();

Page({
    data: {
        exadaystatus: !0,
        itemindex: 0,
        maxitemindex: 0
    },
    showItem: function(e) {
        var t = this, a = e.target.dataset.itemindex;
        t.setData({
            itemindex: a,
            exadaystatus: !1
        });
    },
    showDay: function(e) {
        this.setData({
            exadaystatus: !0
        });
    },
    checkItem: function(e) {
        var t = this, a = t.data.exaitemall, i = t.data.itemindex, n = a[i].myanswer;
        1 == a[i].qtype ? n = e.detail.value.toString() : 2 == a[i].qtype && (n = e.detail.value.sort().toString().replace(/,/g, "")), 
        a[i].itemachecked = -1 != n.indexOf("A"), a[i].itembchecked = -1 != n.indexOf("B"), 
        a[i].itemcchecked = -1 != n.indexOf("C"), a[i].itemdchecked = -1 != n.indexOf("D"), 
        a[i].itemechecked = -1 != n.indexOf("E"), a[i].itemfchecked = -1 != n.indexOf("F"), 
        a[i].myanswer = n, a[i].ischange = !0, t.setData({
            exaitemall: a
        });
    },
    setDay: function() {
        var t = this, a = t.data.exaday.id, i = t.data.user.id;
        e.default.get("exadaydetails", {
            op: "setday",
            id: a,
            userid: i
        }).then(function(e) {
            wx.redirectTo({
                url: "../exa/exadaydetails?id=" + a
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
    setItem: function() {
        var t = arguments.length > 0 && void 0 !== arguments[0] && arguments[0], a = this, i = a.data.exaitemall, n = a.data.itemindex;
        if (i[n].ischange && 1 == a.data.exaday.status) {
            var d = i[n].id, s = i[n].myanswer;
            e.default.get("exadaydetails", {
                op: "setitem",
                exaitemid: d,
                myanswer: s
            }).then(function(e) {
                i[n].ischange = !1, a.setData({
                    exaitemall: i
                }), !0 === t && a.setDay();
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
        } else !0 === t && 1 == a.data.exaday.status && a.setDay();
    },
    submitDay: function() {
        this.setItem(!0);
    },
    upperItem: function(e) {
        var t = this;
        t.setItem(), t.setData({
            itemindex: parseInt(t.data.itemindex) - 1
        });
    },
    lowerItem: function(e) {
        var t = this;
        t.setItem(), t.setData({
            itemindex: parseInt(t.data.itemindex) + 1
        });
    },
    openAexplain: function(e) {
        var t = this, a = t.data.exaitemall;
        a[t.data.itemindex].aexplainhidden = !1, t.setData({
            exaitemall: a
        });
    },
    closeAexplain: function(e) {
        var t = this, a = t.data.exaitemall;
        a[t.data.itemindex].aexplainhidden = !0, t.setData({
            exaitemall: a
        });
    },
    onLoad: function(t) {
        var a = this, i = wx.getStorageSync("param") || null, n = wx.getStorageSync("user") || null;
        a.setData({
            param: i,
            user: n
        }), null == n && wx.redirectTo({
            url: "../login/login"
        });
        var d = t.id, s = n.id;
        e.default.get("exadaydetails", {
            userid: s,
            id: d
        }).then(function(e) {
            a.setData({
                exaday: e.exaday,
                exaitemall: e.exaitemall,
                maxitemindex: e.maxitemindex,
                exadaystatus: 2 == e.exaday.status
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