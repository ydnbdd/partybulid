var e = function(e) {
    return e && e.__esModule ? e : {
        default: e
    };
}(require("we7/resource/js/util.js"));

App({
    onLaunch: function() {},
    onShow: function() {},
    onHide: function() {},
    onError: function(e) {
        console.log(e);
    },
    tabBar: {
        color: "#888888",
        selectedColor: "#e64340",
        backgroundColor: "#ffffff",
        borderStyle: "#e64340",
        list: [ {
            pagePath: "/vlinke_fdcparty/pages/home/home",
            iconPath: "/vlinke_fdcparty/resource/icon/barhome.png",
            selectedIconPath: "/vlinke_fdcparty/resource/icon/barhomeon.png",
            text: "首页"
        }, {
            pagePath: "/vlinke_fdcparty/pages/art/arthome",
            iconPath: "/vlinke_fdcparty/resource/icon/bararthome.png",
            selectedIconPath: "/vlinke_fdcparty/resource/icon/bararthomeon.png",
            text: "动态"
        }, {
            pagePath: "/vlinke_fdcparty/pages/act/acthome",
            iconPath: "/vlinke_fdcparty/resource/icon/baracthome.png",
            selectedIconPath: "/vlinke_fdcparty/resource/icon/baracthomeon.png",
            text: "活动"
        }, {
            pagePath: "/vlinke_fdcparty/pages/edu/eduhome",
            iconPath: "/vlinke_fdcparty/resource/icon/bareduhome.png",
            selectedIconPath: "/vlinke_fdcparty/resource/icon/bareduhomeon.png",
            text: "学习"
        }, {
            pagePath: "/vlinke_fdcparty/pages/my/my",
            iconPath: "/vlinke_fdcparty/resource/icon/barmy.png",
            selectedIconPath: "/vlinke_fdcparty/resource/icon/barmyon.png",
            text: "我的"
        } ]
    },
    util: e.default,
    globalData: {
        userInfo: null
    },
    siteInfo: require("siteinfo.js")
});