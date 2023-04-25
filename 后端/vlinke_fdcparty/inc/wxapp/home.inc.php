<?php

goto SFBH4;
c7CVe:
$param = pdo_get($this->table_param, array("uniacid" => $_W["uniacid"]));
goto YLOLI;
cddly:
hPnAm:
goto p3kIC;
EPWNS:
mu5Rm:
goto g9XDh;
qlv6Y:
xG2Ak:
goto EWCVK;
Lgbd1:
goto jq6DJ;
goto RLpfH;
lbrCm:
Ub_3W:
goto NCbMQ;
S2Uq4:
foreach ($edulesson as $k => $v) {
    $edulesson[$k]["tilpic"] = tomedia($v["tilpic"]);
    QbZ0g:
}
goto b4POZ;
e2yFR:
$user = null;
goto ZIYlY;
ZIYlY:
JBjhc:
goto EdqT1;
SE_j8:
$param["wxapphomenav"] = iunserializer($param["wxapphomenav"]);
goto ak2a7;
vDF3V:
$this->result(41009, "请先登录");
goto aJDNq;
af3Tz:
foreach ($seritem as $k => $v) {
    $seritem[$k]["tilpic"] = tomedia($v["tilpic"]);
    lqu9W:
}
goto qs1M0;
CNkKQ:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    KH97U:
}
goto U0AUe;
U0AUe:
AP6hQ:
goto nyNFr;
Q8n3k:
$notice = pdo_fetchall("SELECT tab.* FROM " . tablename($this->table_notice) . " tab WHERE " . $userpar . " tab.uniacid=:uniacid ORDER BY tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto OmO0j;
WduOI:
if (empty($user)) {
    goto Cv9Pp;
}
goto s9hmN;
ysr7C:
NY3VT:
goto QR83C;
SFBH4:
global $_W, $_GPC;
goto g4ud_;
s9hmN:
$user["headpic"] = tomedia($user["headpic"]);
goto JWaj8;
Jm94n:
$user = pdo_fetch("SELECT u.*, b.name, b.scort FROM " . tablename($this->table_user) . " u LEFT JOIN " . tablename($this->table_branch) . " b ON u.branchid=b.id WHERE u.recycle=0 AND u.wxappopenid=:wxappopenid AND u.uniacid=:uniacid", array(":wxappopenid" => $_W["openid"], ":uniacid" => $_W["uniacid"]));
goto WduOI;
EDMFR:
if (empty($param["wxapphomenav"]["info"])) {
    goto WFaLG;
}
goto OGRJE;
SlIZd:
S_yhO:
goto bPcIQ;
NCbMQ:
ql30F:
goto kcbJI;
uZXtf:
$openhome = intval($_GPC["openhome"]);
goto CAXAP;
g4ud_:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto K96f9;
g9XDh:
if (!empty($_W["openid"])) {
    goto RJHRE;
}
goto vDF3V;
tUt9y:
if (empty($seritem)) {
    goto hPnAm;
}
goto af3Tz;
MBFWb:
$param["wxapphomecon"] = iunserializer($param["wxapphomecon"]);
goto EDMFR;
I8NHA:
SjPN6:
goto f3cnF;
EWCVK:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='home' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto fiK8i;
qs1M0:
pO7e2:
goto cddly;
bPcIQ:
$seritem = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_seritem) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE " . $userpar . " tab.status IN (2,3) AND tab.uniacid=:uniacid ORDER BY tab.status ASC, tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto tUt9y;
dgCQy:
Cv9Pp:
goto e2yFR;
GAwHr:
$userpar = '';
goto sFyCK;
fiK8i:
if (empty($slide)) {
    goto PkEkS;
}
goto CNkKQ;
l64zJ:
Xb7ty:
goto SlIZd;
XkPO6:
nFrtQ:
goto pxeeq;
ak2a7:
$param["wxappfootnav"] = json_encode(iunserializer($param["wxappfootnav"]));
goto MBFWb;
EdqT1:
$this->result(0, '', array("param" => $param, "user" => $user));
goto Lgbd1;
N5J0Y:
foreach ($activity as $k => $v) {
    $activity[$k]["tilpic"] = tomedia($v["tilpic"]);
    gVhaW:
}
goto l64zJ;
fxbvn:
foreach ($article as $k => $v) {
    $article[$k]["tilpic"] = tomedia($v["tilpic"]);
    Cwn7k:
}
goto XkPO6;
QR83C:
WFaLG:
goto Jm94n;
uVnGY:
goto jq6DJ;
goto EPWNS;
KbvqN:
a3MMc:
goto Q8n3k;
uYxkb:
$this->result(1, "请先绑定微信号登录");
goto qlv6Y;
CAXAP:
$userid = intval($_GPC["userid"]);
goto yfnDl;
sFyCK:
if (!($userid != 0 && $branchid != 0)) {
    goto a3MMc;
}
goto b22M1;
K96f9:
if ($op == "display") {
    goto mu5Rm;
}
goto gUbyd;
b4POZ:
biX2X:
goto LtfD7;
YLOLI:
if (!empty($param)) {
    goto SjPN6;
}
goto uGYq0;
p3kIC:
$exapaper = pdo_fetchall("SELECT * FROM " . tablename($this->table_exapaper) . " WHERE uniacid=:uniacid AND starttime<=:starttime ORDER BY endtime DESC LIMIT 6 ", array(":uniacid" => $_W["uniacid"], ":starttime" => time()));
goto qewZ1;
OmO0j:
$edulesson = pdo_fetchall("SELECT tab.* FROM " . tablename($this->table_edulesson) . " tab WHERE tab.status IN (1,2) AND tab.uniacid=:uniacid ORDER BY tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]), "id");
goto Q1NAR;
Yc8LT:
$article = pdo_fetchall("SELECT art.*,b.name FROM " . tablename($this->table_article) . " art LEFT JOIN " . tablename($this->table_branch) . " b ON art.branchid=b.id WHERE art.status=2 AND art.uniacid=:uniacid ORDER BY art.priority DESC, art.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto KHHX1;
qewZ1:
if (empty($exapaper)) {
    goto ql30F;
}
goto p8NHk;
LtfD7:
F3PRO:
goto ea7Zs;
f3cnF:
$param["wxappshareimageurl"] = tomedia($param["wxappshareimageurl"]);
goto SE_j8;
gUbyd:
if ($op == "getdata") {
    goto KAIfn;
}
goto uVnGY;
tmqDE:
if (empty($branch)) {
    goto iw6CE;
}
goto iazCX;
pxeeq:
SolPF:
goto GAwHr;
Ze4NI:
if (empty($activity)) {
    goto S_yhO;
}
goto N5J0Y;
aJDNq:
RJHRE:
goto c7CVe;
LFHZH:
iw6CE:
goto KbvqN;
yfnDl:
$branchid = intval($_GPC["branchid"]);
goto SzcuR;
OGRJE:
foreach ($param["wxapphomenav"]["info"] as $k => $v) {
    $param["wxapphomenav"]["info"][$k]["pic"] = tomedia($v["pic"]);
    CqIvl:
}
goto ysr7C;
uGYq0:
$this->result(1, "请先配置基本信息");
goto I8NHA;
nyNFr:
PkEkS:
goto Yc8LT;
kcbJI:
$this->result(0, '', array("slide" => $slide, "article" => $article, "notice" => $notice, "edulesson" => $edulesson, "activity" => $activity, "seritem" => $seritem, "exapaper" => $exapaper));
goto T19gQ;
b22M1:
$branch = pdo_get($this->table_branch, array("id" => $branchid));
goto tmqDE;
Q1NAR:
if (empty($edulesson)) {
    goto F3PRO;
}
goto S2Uq4;
SzcuR:
if (!($openhome == 0 && $userid == 0)) {
    goto xG2Ak;
}
goto uYxkb;
KHHX1:
if (empty($article)) {
    goto SolPF;
}
goto fxbvn;
ea7Zs:
$activity = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_activity) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE " . $userpar . " tab.status IN (2,3) AND tab.uniacid=:uniacid ORDER BY tab.status ASC, tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto Ze4NI;
iazCX:
$userpar = " tab.branchid in ( " . $branch["scort"] . " ) AND ";
goto LFHZH;
JWaj8:
goto JBjhc;
goto dgCQy;
RLpfH:
KAIfn:
goto uZXtf;
p8NHk:
foreach ($exapaper as $k => $v) {
    $exapaper[$k]["endtime"] = date("Y-m-d H:i", $v["endtime"]);
    Cg9MM:
}
goto lbrCm;
T19gQ:
jq6DJ: