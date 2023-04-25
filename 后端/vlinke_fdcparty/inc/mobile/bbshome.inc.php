<?php

goto sxYl9;
HhX0M:
MSDJF:
goto ox3qz;
ZByH0:
$idstr = implode(",", array_column($list, "id"));
goto DjnjA;
OlMnS:
if (empty($bbscollect)) {
    goto a4H_u;
}
goto nHQEA;
FUVDF:
exit("NOTHAVE");
goto U47Mw;
PSTqH:
l1te9:
goto U1Wmc;
HVY6s:
pdo_insert($this->table_bbsreply, $reply);
goto chQEb;
g0GOE:
goto O7G_X;
goto tcD1j;
zDriB:
if ($op == "display") {
    goto V8Dbz;
}
goto y3vsi;
jcEza:
$id = intval($_GPC["id"]);
goto w4XMd;
FUCbJ:
if (empty($bbszan)) {
    goto G1qOo;
}
goto zkFoX;
fSRdn:
f0BY5:
goto ZByH0;
yqKrZ:
goto O7G_X;
goto c4CUU;
lGD0r:
$par[":cateid"] = $cateid;
goto mOr2t;
IzdsU:
foreach ($list as $k => $v) {
    goto oxD5M;
    oxD5M:
    $list[$k]["simdetails"] = mb_strimwidth($v["details"], 0, 140, "...", "utf-8");
    goto p2zSo;
    p2zSo:
    $list[$k]["ismore"] = mb_strwidth($list[$k]["details"], "utf8") == mb_strwidth($list[$k]["simdetails"], "utf8") ? false : true;
    goto pkzXM;
    pxoOE:
    $list[$k]["zantol"] = 0;
    goto TQCXo;
    Be7Me:
    $list[$k]["details"] = str_replace("\n", "<br/>", $v["details"]);
    goto pxoOE;
    Stdhl:
    $list[$k]["ucollect"] = 0;
    goto KiXQn;
    KiXQn:
    PZo3J:
    goto ccN7C;
    mjm_H:
    $list[$k]["uzan"] = 0;
    goto Stdhl;
    TQCXo:
    $list[$k]["replytol"] = 0;
    goto mjm_H;
    pkzXM:
    $list[$k]["picall"] = iunserializer($v["picall"]);
    goto Be7Me;
    ccN7C:
}
goto ae1jQ;
K6mNA:
b18z2:
goto F0l4v;
nHQEA:
foreach ($bbscollect as $k => $v) {
    $list[$v["topicid"]]["ucollect"] = $v["id"];
    aHDKY:
}
goto gIdNg;
mbjre:
goto O7G_X;
goto TAHfF;
rYoE2:
$ret["msg"] = "success";
goto srPaN;
JnBBQ:
if ($op == "clickzan") {
    goto jHBjF;
}
goto OySNW;
jp7a0:
$con .= " AND tab.cateid=:cateid ";
goto lGD0r;
F0l4v:
pdo_delete($this->table_bbsreply, array("id" => $replyid, "userid" => $user["id"], "uniacid" => $_W["uniacid"]));
goto QEujd;
c4CUU:
DrqeM:
goto LQkd3;
O28zZ:
goto e9XK9;
goto b1_4I;
YziyG:
exit(json_encode($ucollect));
goto mbjre;
eCMJq:
exit(json_encode($ret));
goto jTzab;
U1Wmc:
$ret = array("status" => "error", "msg" => "error");
goto QaS4e;
Rff0S:
exit(json_encode($ret));
goto tIwhB;
QdgoD:
$ret["msg"] = "success";
goto eCMJq;
vXhUx:
$pindex = max(1, intval($_GPC["page"]));
goto tizHI;
B2XSg:
$cateid = intval($_GPC["cateid"]);
goto v56zv;
u1nrx:
$bbscollect = pdo_fetchall("SELECT * FROM " . tablename($this->table_bbscollect) . " WHERE userid=:userid AND topicid IN (" . $idstr . ") AND uniacid=:uniacid ", array(":userid" => $user["id"], ":uniacid" => $_W["uniacid"]));
goto IzdsU;
tIwhB:
GZtEf:
goto vTUwi;
zABqF:
$zanarr = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbszan) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid=:topicid AND tab.uniacid=:uniacid ORDER BY tab.id DESC ", array(":topicid" => $id, ":uniacid" => $_W["uniacid"]));
goto JElO0;
ErCur:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto GvDBp;
qDFYm:
if (!(empty($replyid) || empty($reply))) {
    goto b18z2;
}
goto LDIMc;
lTN_o:
$user = $this->getUser();
goto zDriB;
tldC7:
$data = array("uniacid" => $_W["uniacid"], "topicid" => $id, "userid" => $user["id"], "createtime" => time());
goto L2BcC;
e55Us:
XCJhd:
goto CoYWX;
EHb1s:
$uzan = pdo_insertid();
goto AcKW1;
gIdNg:
z1OQn:
goto NYG1s;
haZQR:
SNs4b:
goto orVRc;
AK4Fa:
if (empty($bbsreply)) {
    goto vqO7v;
}
goto HchyL;
ztDLm:
exit(json_encode($ret));
goto K6mNA;
v56zv:
if (!($cateid != 0)) {
    goto AKXuj;
}
goto jp7a0;
TAHfF:
jHBjF:
goto jcEza;
Fx2R6:
goto BrsNc;
goto e55Us;
DjnjA:
$bbszan = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbszan) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid IN (" . $idstr . ") AND tab.uniacid=:uniacid ORDER BY tab.id DESC ", array(":uniacid" => $_W["uniacid"]));
goto igYTf;
GvDBp:
$param = $this->getParam();
goto lTN_o;
jTzab:
O7G_X:
goto dRPZg;
LDIMc:
$ret["msg"] = "要删除的评论信息不存在，请重试！";
goto ztDLm;
HHlJW:
$id = intval($_GPC["id"]);
goto abu3P;
bHqOu:
if (empty($bbscollect)) {
    goto GW4xp;
}
goto kgzlT;
AcKW1:
BrsNc:
goto zABqF;
U47Mw:
goto sAnRh;
goto fSRdn;
tcD1j:
qyE_x:
goto HHlJW;
vTUwi:
$reply = array("uniacid" => $_W["uniacid"], "topicid" => $id, "userid" => $user["id"], "details" => $details, "islook" => 0, "createtime" => time());
goto HVY6s;
Lxx3O:
$ret["status"] = "success";
goto rYoE2;
ppupS:
$par[":uniacid"] = $_W["uniacid"];
goto B2XSg;
mOr2t:
AKXuj:
goto zQh3f;
w4XMd:
$bbszan = pdo_get($this->table_bbszan, array("userid" => $user["id"], "topicid" => $id, "uniacid" => $_W["uniacid"]));
goto kqLtx;
XcXJC:
if (!empty($list)) {
    goto f0BY5;
}
goto FUVDF;
ae1jQ:
sWBd5:
goto FUCbJ;
RRDhz:
$ucollect = 0;
goto O28zZ;
Xq6eK:
$ucollect = pdo_insertid();
goto SNYYs;
c_7PB:
if ($op == "clickcollect") {
    goto qyE_x;
}
goto JnBBQ;
abu3P:
$bbscollect = pdo_get($this->table_bbscollect, array("userid" => $user["id"], "topicid" => $id, "uniacid" => $_W["uniacid"]));
goto bHqOu;
QEujd:
$ret["status"] = "success";
goto QdgoD;
wtdU2:
goto O7G_X;
goto PSTqH;
cpA9p:
$ret["msg"] = "评论信息不完整，提交失败！";
goto Rff0S;
aUHJs:
$cateid = intval($_GPC["cateid"]);
goto B0mqn;
tizHI:
$psize = 20;
goto cUXpC;
JVA0d:
$reply = pdo_get($this->table_bbsreply, array("id" => $replyid, "userid" => $user["id"], "uniacid" => $_W["uniacid"]));
goto qDFYm;
zkFoX:
foreach ($bbszan as $k => $v) {
    goto hjeIO;
    wcxca:
    $list[$v["topicid"]]["uzan"] = $v["id"];
    goto QGhpF;
    wElQe:
    $list[$v["topicid"]]["zantol"] += 1;
    goto r3oMe;
    QGhpF:
    MGNx8:
    goto x_kD8;
    x_kD8:
    He8qp:
    goto N7Zxk;
    r3oMe:
    if (!($v["userid"] == $user["id"])) {
        goto MGNx8;
    }
    goto wcxca;
    hjeIO:
    $list[$v["topicid"]]["zanarr"][] = $v;
    goto wElQe;
    N7Zxk:
}
goto Q0sqH;
Ue0iQ:
exit(json_encode($ret));
goto wtdU2;
y3vsi:
if ($op == "getmore") {
    goto SNs4b;
}
goto c_7PB;
kgZB2:
pdo_insert($this->table_bbszan, $data);
goto EHb1s;
tna0D:
sAnRh:
goto g0GOE;
Lp2RZ:
goto O7G_X;
goto haZQR;
igYTf:
$bbsreply = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbsreply) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid IN (" . $idstr . ") AND tab.uniacid=:uniacid ORDER BY tab.id ASC ", array(":uniacid" => $_W["uniacid"]));
goto u1nrx;
L2BcC:
pdo_insert($this->table_bbscollect, $data);
goto Xq6eK;
b1_4I:
GW4xp:
goto tldC7;
HchyL:
foreach ($bbsreply as $k => $v) {
    goto kwn2R;
    gmoiT:
    $list[$v["topicid"]]["replytol"] += 1;
    goto uv_f7;
    kwn2R:
    $list[$v["topicid"]]["replyarr"][] = $v;
    goto gmoiT;
    uv_f7:
    bFCgI:
    goto ws31z;
    ws31z:
}
goto HhX0M;
chQEb:
$reply["id"] = pdo_insertid();
goto PIxbF;
BojXi:
if (!(empty($id) || empty($details))) {
    goto GZtEf;
}
goto cpA9p;
JElO0:
exit(json_encode(array("uzan" => $uzan, "zanarr" => $zanarr)));
goto yqKrZ;
SNYYs:
e9XK9:
goto YziyG;
HZ3NY:
V8Dbz:
goto aUHJs;
B0mqn:
$cate = pdo_get($this->table_bbscate, array("id" => $cateid, "isshow" => 1, "uniacid" => $_W["uniacid"]));
goto mKCga;
OySNW:
if ($op == "replypost") {
    goto DrqeM;
}
goto QuaOq;
NYG1s:
a4H_u:
goto tna0D;
kqLtx:
if (empty($bbszan)) {
    goto XCJhd;
}
goto mFZLL;
x6vJX:
$details = trim($_GPC["details"]);
goto BojXi;
mKCga:
$catename = empty($cate) ? "全部话题" : $cate["name"];
goto Lp2RZ;
LQkd3:
$ret = array("status" => "error", "msg" => "error", "reply" => array());
goto Uolhg;
Q0sqH:
LxvbO:
goto kFYJ2;
Uolhg:
$id = intval($_GPC["id"]);
goto x6vJX;
mFZLL:
pdo_delete($this->table_bbszan, array("userid" => $user["id"], "topicid" => $id, "uniacid" => $_W["uniacid"]));
goto sxvR_;
ox3qz:
vqO7v:
goto OlMnS;
kFYJ2:
G1qOo:
goto AK4Fa;
srPaN:
$ret["reply"] = $reply;
goto Ue0iQ;
zQh3f:
$list = pdo_fetchall("SELECT tab.*, c.name as cname, u.realname, u.headpic, b.name as bname FROM " . tablename($this->table_bbstopic) . " tab LEFT JOIN " . tablename($this->table_bbscate) . " c ON tab.cateid=c.id LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id LEFT JOIN " . tablename($this->table_branch) . " b ON u.branchid=b.id " . $con . " ORDER BY tab.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, $par, "id");
goto XcXJC;
Kzprf:
goto O7G_X;
goto HZ3NY;
CoYWX:
$data = array("uniacid" => $_W["uniacid"], "topicid" => $id, "userid" => $user["id"], "createtime" => time());
goto kgZB2;
orVRc:
$branch = $this->getBranch($user["branchid"]);
goto vXhUx;
cUXpC:
$con = " WHERE tab.uniacid=:uniacid AND c.branchid IN (" . $branch["scort"] . ") ";
goto ppupS;
kgzlT:
pdo_delete($this->table_bbscollect, array("userid" => $user["id"], "topicid" => $id, "uniacid" => $_W["uniacid"]));
goto RRDhz;
QuaOq:
if ($op == "replydelete") {
    goto l1te9;
}
goto Kzprf;
PIxbF:
$reply["details"] = str_replace("\n", "<br/>", $reply["details"]);
goto Lxx3O;
sxYl9:
global $_W, $_GPC;
goto ErCur;
sxvR_:
$uzan = 0;
goto Fx2R6;
QaS4e:
$replyid = intval($_GPC["replyid"]);
goto JVA0d;
dRPZg:
include $this->template("bbshome");