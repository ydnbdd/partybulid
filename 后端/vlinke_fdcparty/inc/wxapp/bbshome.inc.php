<?php

goto p05_a;
uJjHG:
$collectid = 0;
goto a8S0Z;
K26Zd:
if (empty($list)) {
    goto jaV38;
}
goto oI_Ff;
V0iPO:
if (!($cateid != 0)) {
    goto WLImK;
}
goto Cfhq0;
nA0D8:
$topicid = intval($_GPC["topicid"]);
goto aOjLd;
oGuyq:
foreach ($bbscollect as $k => $v) {
    $list[$v["topicid"]]["ucollect"] = $v["id"];
    nK_Ee:
}
goto VBuAr;
E58Xn:
$this->result(1, "要删除的评论信息不存在，请重试！");
goto Qpq4v;
eHClT:
fAm8r:
goto iKh8f;
a8S0Z:
goto xCCxF;
goto gEn2u;
i0sTE:
$par[":cateid"] = $cateid;
goto Pkq0e;
S2n49:
if (empty($bbscollect)) {
    goto qSqtp;
}
goto UShgH;
rcqN_:
P7Cse:
goto KJyFq;
LiMn9:
$catename = empty($cate) ? "全部话题" : $cate["name"];
goto Aa4Dt;
Cfhq0:
$con .= " AND tab.cateid=:cateid ";
goto i0sTE;
Nemkz:
bp2cR:
goto HMFFx;
p05_a:
global $_W, $_GPC;
goto Cj6Hy;
q1V2d:
$cate = pdo_get($this->table_bbscate, array("id" => $cateid, "isshow" => 1, "uniacid" => $_W["uniacid"]));
goto LiMn9;
GqBRQ:
pdo_insert($this->table_bbscollect, $data);
goto g2ei8;
fkVqx:
jaV38:
goto hgefJ;
ywGM6:
goto PyQJl;
goto w9bWF;
zqsH3:
$pindex = max(1, intval($_GPC["pindex"]));
goto E9bzl;
VAMNQ:
if (empty($bbsreply)) {
    goto P7Cse;
}
goto Wb52y;
sNv3g:
pdo_insert($this->table_bbszan, $data);
goto iT8w0;
w4k5X:
o1G5z:
goto KNja5;
wDuLF:
TB_re:
goto CiRQy;
fGNvd:
$this->result(0, '', array("tol" => count($bbsreplyall), "arr" => $bbsreplyall));
goto rYMTg;
euJ9h:
goto eu33F;
goto pdC6u;
JFOWA:
if ($op == "clickcollect") {
    goto fAm8r;
}
goto A8yKl;
gQRFk:
$bbszanall = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbszan) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid=:topicid AND tab.uniacid=:uniacid ORDER BY tab.id DESC ", array(":topicid" => $topicid, ":uniacid" => $_W["uniacid"]));
goto iU9ki;
wHuqM:
wdpg1:
goto doT25;
EfUr2:
$this->result(0, '', array("tol" => count($bbsreplyall), "arr" => $bbsreplyall));
goto YR34A;
eyb_M:
Bkh8N:
goto G2BN6;
C4Rda:
$userid = intval($_GPC["userid"]);
goto gwm2I;
wM5ok:
if ($op == "getmore") {
    goto bumo_;
}
goto JFOWA;
q4otf:
$this->result(1, "评论信息不完整，提交失败！");
goto OxTD_;
xSCKG:
WcjKy:
goto fkVqx;
VBuAr:
vXPpn:
goto xSCKG;
h28xr:
$bbsreplyall = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbsreply) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid=:topicid AND tab.uniacid=:uniacid ORDER BY tab.id ASC ", array(":topicid" => $reply["topicid"], ":uniacid" => $_W["uniacid"]));
goto EfUr2;
KNja5:
if (empty($bbszan)) {
    goto YJ7m8;
}
goto mxWd8;
g2ei8:
$collectid = pdo_insertid();
goto S2XFA;
pcN3C:
$reply = pdo_get($this->table_bbsreply, array("id" => $replyid, "userid" => $userid, "uniacid" => $_W["uniacid"]));
goto TTCfA;
aOjLd:
$bbscollect = pdo_get($this->table_bbscollect, array("userid" => $userid, "topicid" => $topicid, "uniacid" => $_W["uniacid"]));
goto S2n49;
pC3pQ:
goto eu33F;
goto wDuLF;
iy7q8:
$bbszan = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbszan) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid IN (" . $idstr . ") AND tab.uniacid=:uniacid ORDER BY tab.id DESC ", array(":uniacid" => $_W["uniacid"]));
goto CQOfz;
QzoBc:
$data = array("uniacid" => $_W["uniacid"], "topicid" => $topicid, "userid" => $userid, "createtime" => time());
goto GqBRQ;
w9bWF:
CmH7N:
goto eyCGn;
RUafs:
if ($op == "replypost") {
    goto BFkJG;
}
goto C93O8;
YRO9i:
goto eu33F;
goto wHuqM;
mc4E7:
$zanid = 0;
goto ywGM6;
dAMp1:
$this->result(0, '', array("collectid" => $collectid));
goto pC3pQ;
Tzj2w:
$par[":uniacid"] = $_W["uniacid"];
goto JMJ1r;
TTCfA:
if (!(empty($userid) || empty($replyid) || empty($reply))) {
    goto vUBuw;
}
goto E58Xn;
hgefJ:
$this->result(0, '', array_values($list));
goto kDr7x;
eeJB1:
BFkJG:
goto C4Rda;
IF3bA:
$topicid = intval($_GPC["topicid"]);
goto cPguM;
LvgR0:
$userscort = trim($_GPC["userscort"]);
goto zqsH3;
gn3J2:
$con = " WHERE tab.uniacid=:uniacid AND c.branchid IN (" . $userscort . ") ";
goto Tzj2w;
TB5pu:
$bbsreplyall = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbsreply) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid=:topicid AND tab.uniacid=:uniacid ORDER BY tab.id ASC ", array(":topicid" => $topicid, ":uniacid" => $_W["uniacid"]));
goto fGNvd;
S2XFA:
xCCxF:
goto dAMp1;
UShgH:
pdo_delete($this->table_bbscollect, array("userid" => $userid, "topicid" => $topicid, "uniacid" => $_W["uniacid"]));
goto uJjHG;
C93O8:
if ($op == "replydelete") {
    goto bp2cR;
}
goto YRO9i;
wMfWY:
PyQJl:
goto gQRFk;
OxTD_:
OnfC3:
goto Roazp;
dQTc1:
if (!(empty($userid) || empty($topicid) || empty($details))) {
    goto OnfC3;
}
goto q4otf;
CiRQy:
$userid = intval($_GPC["userid"]);
goto IF3bA;
Qpq4v:
vUBuw:
goto BRGDn;
EJ08b:
$userid = intval($_GPC["userid"]);
goto LvgR0;
oI_Ff:
$idstr = implode(",", array_column($list, "id"));
goto iy7q8;
rYMTg:
goto eu33F;
goto Nemkz;
vYrCc:
foreach ($list as $k => $v) {
    goto Hdtnb;
    lNhar:
    $list[$k]["createtime"] = date("Y-m-d H:i", $v["createtime"]);
    goto o131y;
    JyxyQ:
    bybdG:
    goto lNhar;
    lJCKD:
    $list[$k]["headpic"] = tomedia($v["headpic"]);
    goto XnwJL;
    R9ZkJ:
    $list[$k]["toolong"] = $list[$k]["details"] == $list[$k]["simdetails"] ? false : true;
    goto lJCKD;
    lwqdo:
    $list[$k]["ucollect"] = 0;
    goto MXLU2;
    cxe0n:
    foreach ($list[$k]["picall"] as $key => $value) {
        $list[$k]["picall"][$key] = tomedia($value);
        iHANW:
    }
    goto L0AQc;
    XnwJL:
    $list[$k]["picall"] = iunserializer($v["picall"]);
    goto jN4MW;
    L0AQc:
    Cl2xS:
    goto JyxyQ;
    NmwdW:
    $list[$k]["ishidden"] = $list[$k]["details"] == $list[$k]["simdetails"] ? false : true;
    goto R9ZkJ;
    r8kuj:
    $list[$k]["replytol"] = 0;
    goto fyjeN;
    jN4MW:
    if (empty($list[$k]["picall"])) {
        goto bybdG;
    }
    goto cxe0n;
    fyjeN:
    $list[$k]["uzan"] = 0;
    goto lwqdo;
    Hdtnb:
    $list[$k]["simdetails"] = mb_strimwidth($v["details"], 0, 120, "...", "utf-8");
    goto NmwdW;
    MXLU2:
    AwQ7S:
    goto Hk9wm;
    o131y:
    $list[$k]["zantol"] = 0;
    goto r8kuj;
    Hk9wm:
}
goto w4k5X;
F8R5j:
if (empty($bbszan)) {
    goto CmH7N;
}
goto ro85L;
HMFFx:
$userid = intval($_GPC["userid"]);
goto z40rA;
imJXU:
$bbscollect = pdo_fetchall("SELECT * FROM " . tablename($this->table_bbscollect) . " WHERE userid=:userid AND topicid IN (" . $idstr . ") AND uniacid=:uniacid ", array(":userid" => $userid, ":uniacid" => $_W["uniacid"]));
goto vYrCc;
fJtWi:
$details = trim($_GPC["details"]);
goto dQTc1;
mxWd8:
foreach ($bbszan as $k => $v) {
    goto YEPMD;
    tfPyF:
    OFGjD:
    goto Okh1R;
    YEPMD:
    $list[$v["topicid"]]["zanarr"][] = $v;
    goto fJ6UU;
    Okh1R:
    mDgvP:
    goto AUifP;
    fJ6UU:
    $list[$v["topicid"]]["zantol"] += 1;
    goto DpNm1;
    DpNm1:
    if (!($v["userid"] == $userid)) {
        goto OFGjD;
    }
    goto L2sXy;
    L2sXy:
    $list[$v["topicid"]]["uzan"] = $v["id"];
    goto tfPyF;
    AUifP:
}
goto eyb_M;
KJyFq:
if (empty($bbscollect)) {
    goto WcjKy;
}
goto oGuyq;
kDr7x:
goto eu33F;
goto eHClT;
Aa4Dt:
$this->result(0, '', array("catename" => $catename));
goto euJ9h;
Cj6Hy:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto jQd6a;
eyCGn:
$data = array("uniacid" => $_W["uniacid"], "topicid" => $topicid, "userid" => $userid, "createtime" => time());
goto sNv3g;
JMJ1r:
$cateid = intval($_GPC["cateid"]);
goto V0iPO;
jQd6a:
if ($op == "display") {
    goto wdpg1;
}
goto wM5ok;
cPguM:
$bbszan = pdo_get($this->table_bbszan, array("userid" => $userid, "topicid" => $topicid, "uniacid" => $_W["uniacid"]));
goto F8R5j;
BRGDn:
pdo_delete($this->table_bbsreply, array("id" => $replyid, "userid" => $userid, "uniacid" => $_W["uniacid"]));
goto h28xr;
yUkDu:
pdo_insert($this->table_bbsreply, $data);
goto TB5pu;
JkCKF:
o0cg1:
goto rcqN_;
E9bzl:
$psize = max(1, intval($_GPC["psize"]));
goto gn3J2;
iKh8f:
$userid = intval($_GPC["userid"]);
goto nA0D8;
iT8w0:
$zanid = pdo_insertid();
goto wMfWY;
Pkq0e:
WLImK:
goto T1u6O;
A8yKl:
if ($op == "clickzan") {
    goto TB_re;
}
goto RUafs;
doT25:
$cateid = intval($_GPC["cateid"]);
goto q1V2d;
gEn2u:
qSqtp:
goto QzoBc;
CQOfz:
$bbsreply = pdo_fetchall("SELECT tab.*, u.realname, u.headpic FROM " . tablename($this->table_bbsreply) . " tab LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id WHERE tab.topicid IN (" . $idstr . ") AND tab.uniacid=:uniacid ORDER BY tab.id ASC ", array(":uniacid" => $_W["uniacid"]));
goto imJXU;
gwm2I:
$topicid = intval($_GPC["topicid"]);
goto fJtWi;
Wb52y:
foreach ($bbsreply as $k => $v) {
    goto T1Y5L;
    OHXuK:
    $list[$v["topicid"]]["replytol"] += 1;
    goto Af5KS;
    T1Y5L:
    $list[$v["topicid"]]["replyarr"][] = $v;
    goto OHXuK;
    Af5KS:
    hqAkP:
    goto lhwWr;
    lhwWr:
}
goto JkCKF;
gc2fu:
goto eu33F;
goto eeJB1;
G2BN6:
YJ7m8:
goto VAMNQ;
ro85L:
pdo_delete($this->table_bbszan, array("userid" => $userid, "topicid" => $topicid, "uniacid" => $_W["uniacid"]));
goto mc4E7;
z40rA:
$replyid = intval($_GPC["replyid"]);
goto pcN3C;
pdC6u:
bumo_:
goto EJ08b;
Roazp:
$data = array("uniacid" => $_W["uniacid"], "topicid" => $topicid, "userid" => $userid, "details" => $details, "islook" => 0, "createtime" => time());
goto yUkDu;
iU9ki:
$this->result(0, '', array("zanid" => $zanid, "tol" => count($bbszanall), "arr" => $bbszanall));
goto gc2fu;
T1u6O:
$list = pdo_fetchall("SELECT tab.*, c.name as cname, u.realname, u.headpic, b.name as bname FROM " . tablename($this->table_bbstopic) . " tab LEFT JOIN " . tablename($this->table_bbscate) . " c ON tab.cateid=c.id LEFT JOIN " . tablename($this->table_user) . " u ON tab.userid=u.id LEFT JOIN " . tablename($this->table_branch) . " b ON u.branchid=b.id " . $con . " ORDER BY tab.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, $par, "id");
goto K26Zd;
YR34A:
eu33F: