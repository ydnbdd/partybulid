<?php

goto rSSvk;
KgwJN:
if (empty($branch)) {
    goto vi_eA;
}
goto fch8Q;
yjFBa:
if ($op == "display") {
    goto ss4JY;
}
goto wd7WS;
XZ48H:
d2dJz:
goto rVI0i;
rSSvk:
global $_W, $_GPC;
goto OsPOF;
OrHtF:
$pindex = max(1, intval($_GPC["pindex"]));
goto uZVAW;
o2may:
jvy0v:
goto rrqy7;
ONCOS:
$this->result(0, '', $list);
goto Y03BL;
HEuj7:
if (empty($actenroll)) {
    goto XEyaB;
}
goto b57Vt;
XGJoa:
if (empty($slide)) {
    goto zLWiy;
}
goto tMQZK;
x21aq:
foreach ($list as $k => $v) {
    goto HAwed;
    HAwed:
    $list[$k]["tilpic"] = tomedia($v["tilpic"]);
    goto sXAK7;
    sXAK7:
    $list[$k]["createtime"] = date("Y-m-d H:i", $v["createtime"]);
    goto MO4C5;
    MO4C5:
    RRzV1:
    goto ItGbq;
    ItGbq:
}
goto YnIPc;
wd7WS:
if ($op == "getmore") {
    goto d2dJz;
}
goto FaF0v;
uZVAW:
$psize = max(1, intval($_GPC["psize"]));
goto Iv2I7;
Iv2I7:
$list = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_activity) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE " . $par . " tab.uniacid=:uniacid ORDER BY tab.priority DESC, tab.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto XSJZf;
bAmAX:
$branch = pdo_get($this->table_branch, array("id" => $branchid, "uniacid" => $_W["uniacid"]));
goto oucAs;
hTGl1:
hfqm5:
goto I3Loy;
S464r:
WKxJ8:
goto ONCOS;
Eflg7:
$this->result(0, '', array("actenroll" => $actenroll, "slide" => $slide));
goto JwZIk;
TSyY2:
vi_eA:
goto OrHtF;
OsPOF:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto yjFBa;
b57Vt:
foreach ($actenroll as $k => $v) {
    $actenroll[$k]["headpic"] = tomedia($v["headpic"]);
    apuoq:
}
goto hTGl1;
YnIPc:
qvrtI:
goto S464r;
JwZIk:
goto pL1d9;
goto XZ48H;
XSJZf:
if (empty($list)) {
    goto WKxJ8;
}
goto x21aq;
oucAs:
$par = " tab.status IN (2,3) AND ";
goto KgwJN;
rVI0i:
$branchid = intval($_GPC["branchid"]);
goto bAmAX;
U_L1Q:
$actenroll = pdo_fetchall("SELECT e.*,u.realname,u.headpic,a.title FROM " . tablename($this->table_actenroll) . " e LEFT JOIN " . tablename($this->table_user) . " u ON e.userid=u.id LEFT JOIN " . tablename($this->table_activity) . " a ON e.activityid=a.id WHERE e.uniacid=:uniacid ORDER BY e.id LIMIT 20 ", array(":uniacid" => $_W["uniacid"]));
goto lFxC1;
I3Loy:
XEyaB:
goto XGJoa;
fch8Q:
$par .= " tab.branchid in ( " . $branch["scort"] . " ) AND ";
goto TSyY2;
rrqy7:
zLWiy:
goto Eflg7;
FaF0v:
goto pL1d9;
goto Irk8D;
lFxC1:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='acthome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto HEuj7;
tMQZK:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    urhi6:
}
goto o2may;
Irk8D:
ss4JY:
goto U_L1Q;
Y03BL:
pL1d9: