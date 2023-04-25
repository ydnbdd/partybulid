var t = function(t) {
    return t && t.__esModule ? t : {
        default: t
    };
}(require("../../util/request.js")), e = getApp();

Page({
    data: {
        pindex: 1,
        psize: 20,
        hasMore: !0,
        list: [],
        myaudio: !1
    },
    getMore: function() {
        var e = this;
        wx.showToast({
            title: "加载中",
            icon: "loading"
        });
        var a = e.data.edulesson.id, i = e.data.pindex, o = e.data.psize;
        t.default.post("edumessage", {
            op: "getmore",
            lessonid: a,
            pindex: i,
            psize: o
        }).then(function(t) {
            var a = e.data.list;
            1 == e.data.pindex && (a = []);
            var i = t;
            i.length < e.data.psize ? e.setData({
                list: a.concat(i),
                hasMore: !1
            }) : e.setData({
                list: a.concat(i),
                hasMore: !0,
                pindex: e.data.pindex + 1
            }), wx.hideToast();
        });
    },
    previewImage: function(t) {
        var e = this, a = t.target.dataset.messageid, i = t.target.dataset.src;
        wx.previewImage({
            current: i,
            urls: e.data.list[a].picall
        });
    },
    onLoad: function(e) {
        var a = this, i = wx.getStorageSync("param") || null, o = wx.getStorageSync("user") || null;
        a.setData({
            param: i,
            user: o
        }), null == o && wx.redirectTo({
            url: "../login/login"
        });
        var s = e.id, d = o.id;
        t.default.get("edulesson", {
            id: s,
            userid: d
        }).then(function(t) {
            a.setData({
                edulesson: t.edulesson,
                educate: t.educate,
                edustudy: t.edustudy,
                edustudytol: t.edustudytol,
                educhapterall: t.educhapterall
            });
        }, function(t) {
            wx.showModal({
                title: "提示",
                content: t,
                showCancel: !1,
                success: function(t) {
                    t.confirm && wx.redirectTo({
                        url: "../edu/eduhome"
                    });
                }
            }), console.log(t);
        });
    },
    audioClick: function() {
        var t = this;
        !1 === t.data.myaudio ? t.audioCtx.play() : t.audioCtx.pause(), t.setData({
            myaudio: !t.data.myaudio
        });
    },
    onReady: function() {
        e.util.footer(this), this.audioCtx = wx.createAudioContext("myAudio");
    },
    onShow: function() {
        !0 === this.data.myaudio && this.audioCtx.play();
    },
    onHide: function() {
        this.audioCtx.pause();
    },
    onUnload: function() {
        this.data.innerAudioContext.destroy();
    },
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