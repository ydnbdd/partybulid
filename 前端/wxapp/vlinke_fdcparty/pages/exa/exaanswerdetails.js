var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("../../util/request.js")), t = getApp();

Page({
    data: {
        exaanswerstatus: 0,
        itemindex: 0,
        maxitemindex: 0
    },
    showItem: function(e) {
        var t = this, a = e.target.dataset.itemindex;
        t.setData({
            itemindex: a,
            exaanswerstatus: 1
        });
    },
    showAnswer: function(e) {
        this.setData({
            exaanswerstatus: 2
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
    setAnswer: function() {
        var t = this, a = t.data.exaanswer.id, i = t.data.user.id;
        e.default.get("exaanswerdetails", {
            op: "setanswer",
            id: a,
            userid: i
        }).then(function(e) {
            wx.redirectTo({
                url: "../exa/exaanswerdetails?id=" + a
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
        if (i[n].ischange && 1 == a.data.exaanswer.status) {
            var s = i[n].id, r = i[n].myanswer;
            e.default.get("exaanswerdetails", {
                op: "setitem",
                exaitemid: s,
                myanswer: r
            }).then(function(e) {
                i[n].ischange = !1, a.setData({
                    exaitemall: i
                }), !0 === t && a.setAnswer();
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
        } else !0 === t && 1 == a.data.exaanswer.status && a.setAnswer();
    },
    submitAnswer: function() {
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
    startAnswer: function(t) {
        var a = this, i = a.data.exaanswer.id, n = a.data.user.id;
        e.default.get("exaanswerdetails", {
            op: "startanswer",
            id: i,
            userid: n
        }).then(function(e) {
            wx.redirectTo({
                url: "../exa/exaanswerdetails?id=" + i
            });
        }, function(e) {
            wx.showModal({
                title: "提示信息",
                content: e,
                showCancel: !1,
                success: function(e) {
                    e.confirm && wx.redirectTo({
                        url: "../exa/exapaper"
                    });
                }
            });
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
        var s = t.id, r = n.id;
        e.default.get("exaanswerdetails", {
            userid: r,
            id: s
        }).then(function(e) {
            a.setData({
                exaanswer: e.exaanswer,
                exapaper: e.exapaper,
                exaitemall: e.exaitemall,
                timelimit: e.timelimit,
                exaanswerstatus: e.exaanswer.status,
                maxitemindex: e.maxitemindex
            });
        }, function(e) {
            wx.showModal({
                title: "提示信息",
                content: e,
                showCancel: !1,
                success: function(e) {
                    e.confirm && wx.redirectTo({
                        url: "../exa/exapaper"
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