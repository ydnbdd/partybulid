var t = function(t) {
    return t && t.__esModule ? t : {
        default: t
    };
}(require("../../util/request.js")), e = require("../../util/image.js"), a = getApp();

Page({
    data: {
        cateid: 0,
        details: "",
        picall: []
    },
    previewImage: function(t) {
        var e = this, a = t.target.dataset.messageid, n = t.target.dataset.src;
        wx.previewImage({
            current: n,
            urls: e.data.list[a].picall
        });
    },
    chooseImage: function() {
        var t = this, a = t.data.picall;
        (0, e.chooseImage)().then(function(t) {
            if (!(a.length >= 9)) return (0, e.upload)(t);
            wx.showToast({
                title: "最多上传九张"
            });
        }, function(t) {
            wx.showToast({
                title: "选择图片失败"
            });
        }).then(function(e) {
            a = a.concat(e.filename), t.setData({
                picall: a
            }), console.log(a);
        }, function(t) {
            wx.showToast({
                title: "图片上传失败"
            });
        });
    },
    picclearImage: function(t) {
        var e = this, a = t.currentTarget.dataset.index, n = e.data.picall;
        n.splice(a, 1), e.setData({
            picall: n
        });
    },
    formSubmit: function(e) {
        var a = this, n = a.data.cateid, i = a.data.user.id, o = e.detail.value.title, s = e.detail.value.details, c = JSON.stringify(a.data.picall);
        0 == n ? wx.showModal({
            title: "提示",
            content: "请选择话题分类！",
            showCancel: !1,
            success: function(t) {}
        }) : 0 == o.length || 0 == s.length ? wx.showModal({
            title: "提示",
            content: "标题和内容均不能为空！",
            showCancel: !1,
            success: function(t) {}
        }) : t.default.post("bbspost", {
            op: "addpost",
            cateid: n,
            userid: i,
            title: o,
            details: s,
            picall: c
        }).then(function(t) {
            wx.showModal({
                title: "提示",
                content: "话题提交成功！",
                showCancel: !1,
                success: function(t) {
                    wx.redirectTo({
                        url: "../bbs/bbshome"
                    });
                }
            });
        }, function(t) {
            wx.showModal({
                title: "提示",
                content: t,
                showCancel: !1,
                success: function(t) {}
            });
        });
    },
    onLoad: function(e) {
        var a = this, n = wx.getStorageSync("attachurl") || "", i = wx.getStorageSync("param") || null, o = wx.getStorageSync("user") || null;
        a.setData({
            attachurl: n,
            param: i,
            user: o
        }), null == o && wx.redirectTo({
            url: "../login/login"
        });
        var s = o.scort;
        t.default.get("bbspost", {
            userscort: s
        }).then(function(t) {
            a.setData({
                cate: t.cate
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
    bindCateidChange: function(t) {
        var e = t.detail.value, a = this.data.cate[e].id;
        this.setData({
            cateid: a,
            index: e
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
        var t = this;
        return {
            title: t.data.param.wxappsharetitle,
            path: "/vlinke_fdcparty/pages/home/home",
            imageUrl: t.data.param.wxappshareimageurl
        };
    }
});