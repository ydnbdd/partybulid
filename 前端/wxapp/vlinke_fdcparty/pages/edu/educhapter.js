var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("../../util/request.js")), t = getApp();

Page({
    data: {
        needtime: "剩余 0 秒",
        interval: "",
        myaudio: !1
    },
    funTime: function() {
        var t = this, a = parseInt(t.data.educhapter.needtime), n = parseInt(t.data.edulog.stutime), i = 10, r = parseInt(a - n);
        switch (!0) {
          case r < 60:
            i = 15;
            break;

          case r >= 60 && r < 300:
            i = 30;
            break;

          case r >= 300 && r < 900:
            i = 180;
            break;

          case r >= 900 && r < 1800:
            i = 300;
            break;

          default:
            i = 600;
        }
        var u = 0, d = setInterval(function() {
            if (n = parseInt(n) + 1, u = a - n, t.setData({
                needtime: "剩余 " + u + " 秒"
            }), n % i == 0 || u <= 0) {
                var r = t.data.educhapter.id, d = t.data.edulog.id;
                e.default.get("educhapter", {
                    op: "stutime",
                    chapterid: r,
                    logid: d,
                    needtime: a,
                    stutime: n,
                    showLoading: !1
                });
            }
            u <= 0 && (clearInterval(t.data.interval), t.setData({
                needtime: "已完成"
            }));
        }, 1e3);
        t.setData({
            interval: d
        });
    },
    onLoad: function(t) {
        var a = this, n = wx.getStorageSync("param") || null, i = wx.getStorageSync("user") || null;
        a.setData({
            param: n,
            user: i
        }), null == i && wx.redirectTo({
            url: "../login/login"
        });
        var r = t.id, u = i.id;
        e.default.get("educhapter", {
            id: r,
            userid: u
        }).then(function(e) {
            a.setData({
                educhapter: e.educhapter,
                edulesson: e.edulesson,
                educate: e.educate,
                edulog: e.edulog,
                educhapterall: e.educhapterall,
                prev: e.prev,
                next: e.next
            }), 0 != e.educhapter.link.length && wx.redirectTo({
                url: "../webview/webview?weburl=" + e.educhapter.link
            }), parseInt(e.educhapter.needtime) - parseInt(e.edulog.stutime) <= 0 ? a.setData({
                needtime: "已完成"
            }) : a.funTime(), console.log(e);
        }, function(e) {
            wx.showModal({
                title: "提示",
                content: e,
                showCancel: !1,
                success: function(e) {
                    e.confirm && wx.redirectTo({
                        url: "../edu/eduhome"
                    });
                }
            }), console.log(e);
        });
    },
    audioClick: function() {
        var e = this;
        !1 === e.data.myaudio ? e.audioCtx.play() : e.audioCtx.pause(), e.setData({
            myaudio: !e.data.myaudio
        });
    },
    onReady: function() {
        t.util.footer(this), this.audioCtx = wx.createAudioContext("myAudio");
    },
    onShow: function() {
        !0 === this.data.myaudio && this.audioCtx.play();
    },
    onHide: function() {
        var e = this;
        clearInterval(e.data.interval), e.audioCtx.pause();
    },
    onUnload: function() {
        var e = this;
        clearInterval(e.data.interval), e.data.innerAudioContext.destroy();
    },
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