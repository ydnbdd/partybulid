<?php

goto Dc9HP;
Gdcyw:
if ($op == "siglog") {
    goto qdFbu;
}
goto vM0Xu;
Nz3wG:
$psize = 20;
goto wjfl2;
jwnhm:
qdFbu:
goto fotrZ;
rPAj8:
if ($op == "setsign") {
    goto rgiiL;
}
goto Gdcyw;
M_eWn:
$etime = strtotime(date("Y-m-d" . "23:59:59", time()));
goto ekpBc;
ekpBc:
$signlog = pdo_fetch("SELECT * FROM " . tablename($this->table_signlog) . " WHERE createtime>:stime AND createtime<:etime AND uniacid=:uniacid ", array(":stime" => $stime, ":etime" => $etime, ":uniacid" => $_W["uniacid"]));
goto WzMcs;
AEsbF:
if (!($param["sigintegral"] > 0)) {
    goto QP8EU;
}
goto e_8zp;
VyJEt:
$signlog = pdo_fetch("SELECT * FROM " . tablename($this->table_signlog) . " WHERE createtime>:stime AND createtime<:etime AND uniacid=:uniacid ", array(":stime" => $stime, ":etime" => $etime, ":uniacid" => $_W["uniacid"]));
goto C8LJB;
Y2wyB:
$this->setIntegral($data);
goto N_ak0;
T1bmx:
mjbLY:
goto EwcU6;
TygFW:
NCNUU:
goto FAs0N;
WndDc:
exit("NOTHAVE");
goto oGE9r;
ehWub:
$user = $this->getUser();
goto Q6pIK;
NmvLQ:
$sigid = pdo_insertid();
goto AEsbF;
LrSGX:
exit("NOTHAVE");
goto TVwv5;
WMGxp:
if (!empty($list)) {
    goto cZnTb;
}
goto WndDc;
nP_tO:
goto nVLma;
goto Ev5Gg;
G99ox:
$param = $this->getParam();
goto ehWub;
OFlp6:
Qwd4T:
goto QK8GE;
Q6pIK:
if ($op == "display") {
    goto CLqz2;
}
goto WI8A4;
WI8A4:
if ($op == "daygetmore") {
    goto mjbLY;
}
goto rPAj8;
pkMcm:
$dayetime = strtotime(date("Y-m-d" . "00:00:00", time()));
goto E03Lq;
aAPUV:
if (!empty($list)) {
    goto xQoIj;
}
goto LrSGX;
Dc9HP:
global $_W, $_GPC;
goto OZ3uj;
C8LJB:
goto nVLma;
goto T1bmx;
E03Lq:
$daysignlog = pdo_fetch("SELECT * FROM " . tablename($this->table_signlog) . " WHERE createtime>:stime AND createtime<:etime AND uniacid=:uniacid ", array(":stime" => $daystime, ":etime" => $dayetime, ":uniacid" => $_W["uniacid"]));
goto Somfd;
l0w2E:
$stime = strtotime(date("Y-m-d" . "00:00:00", time()));
goto sgwzV;
zTPDL:
rgiiL:
goto YLQ4c;
TVwv5:
xQoIj:
goto beFDP;
caP2i:
$etime = strtotime(date("Y-m-d" . "23:59:59", time()));
goto VyJEt;
e_8zp:
$data = array("userid" => $user["id"], "channel" => "signlog", "foreignid" => $sigid, "integral" => $param["sigintegral"], "remark" => date("Y年m月d日") . "签到奖励");
goto Y2wyB;
VeYE8:
message("签到成功！", $this->createMobileUrl("sighome", array("op" => "display")), "success");
goto Z4Kk0;
YLQ4c:
$stime = strtotime(date("Y-m-d" . "00:00:00", time()));
goto M_eWn;
vM0Xu:
if ($op == "getmore") {
    goto NCNUU;
}
goto nP_tO;
beFDP:
nVLma:
goto V0KJM;
ed2Be:
pdo_insert($this->table_signlog, $data);
goto NmvLQ;
OZ3uj:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto G99ox;
FAs0N:
$pindex = max(1, intval($_GPC["page"]));
goto Nz3wG;
WzMcs:
if (empty($signlog)) {
    goto Qwd4T;
}
goto lMDUo;
Ev5Gg:
CLqz2:
goto jcYjL;
fotrZ:
goto nVLma;
goto TygFW;
QK8GE:
$daystime = strtotime(date("Y-m-d" . "00:00:00", time())) - 86400;
goto pkMcm;
wjfl2:
$list = pdo_fetchall("SELECT l.*,u.headpic,u.realname FROM " . tablename($this->table_signlog) . " l LEFT JOIN " . tablename($this->table_user) . " u ON l.userid=u.id WHERE l.userid=:userid AND l.uniacid=:uniacid ORDER BY l.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":userid" => $user["id"], ":uniacid" => $_W["uniacid"]));
goto aAPUV;
N_ak0:
QP8EU:
goto VeYE8;
HXeIY:
$psize = 20;
goto l0w2E;
iwPY2:
$list = pdo_fetchall("SELECT l.*,u.headpic,u.realname FROM " . tablename($this->table_signlog) . " l LEFT JOIN " . tablename($this->table_user) . " u ON l.userid=u.id WHERE l.createtime>:stime AND l.createtime<:etime AND l.uniacid=:uniacid ORDER BY l.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":stime" => $stime, ":etime" => $etime, ":uniacid" => $_W["uniacid"]));
goto WMGxp;
Z4Kk0:
goto nVLma;
goto jwnhm;
jcYjL:
$stime = strtotime(date("Y-m-d" . "00:00:00", time()));
goto caP2i;
sgwzV:
$etime = strtotime(date("Y-m-d" . "23:59:59", time()));
goto iwPY2;
ezQ7Q:
goto nVLma;
goto zTPDL;
oGE9r:
cZnTb:
goto ezQ7Q;
Somfd:
$data = array("uniacid" => $_W["uniacid"], "userid" => $user["id"], "integral" => $param["sigintegral"] <= 0 ? 0 : $param["sigintegral"], "number" => empty($daysignlog) ? 1 : intval($daysignlog["number"]) + 1, "createtime" => time());
goto ed2Be;
EwcU6:
$pindex = max(1, intval($_GPC["page"]));
goto HXeIY;
lMDUo:
message("今日你已签到过了！", referer(), "error");
goto OFlp6;
V0KJM:
include $this->template("sighome");