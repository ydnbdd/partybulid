<?php

goto TuuRa;
hbolw:
if ($op == "display") {
    goto hwo3O;
}
goto bRN9a;
XIBTo:
AwZ8f:
goto FvO7l;
YOY4d:
if (empty($catenav)) {
    goto ChKYS;
}
goto SoMmI;
EYYjA:
goto QCV_i;
goto ZI8YR;
AaxRu:
pDjLo:
goto WPDde;
aiF5o:
cczRe:
goto qyxeM;
e1Stq:
$psize = max(1, intval($_GPC["psize"]));
goto F3Lmo;
jm3He:
vEiF_:
goto aiF5o;
TuuRa:
global $_W, $_GPC;
goto LUY78;
bRN9a:
if ($op == "getmore") {
    goto j640q;
}
goto IWdc6;
inSD0:
$catenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_sercate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto XAmCP;
EwZqo:
foreach ($list as $k => $v) {
    goto RdZae;
    yTENo:
    $list[$k]["createtime"] = date("Y-m-d H:i", $v["createtime"]);
    goto fGm2A;
    fGm2A:
    qIW_O:
    goto hSZgq;
    RdZae:
    $list[$k]["tilpic"] = tomedia($v["tilpic"]);
    goto yTENo;
    hSZgq:
}
goto AaxRu;
MutIz:
$par = " tab.status IN (2,3) AND ";
goto RxliV;
U2oOd:
$pindex = max(1, intval($_GPC["pindex"]));
goto e1Stq;
FvO7l:
sXmK6:
goto YOY4d;
F3Lmo:
$list = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_seritem) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE " . $par . " tab.uniacid=:uniacid ORDER BY tab.priority DESC, tab.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto s0QK_;
qyxeM:
$this->result(0, '', array("catenav" => $catenav, "catelist" => $catelist, "slide" => $slide));
goto EYYjA;
HUpOU:
$branchid = intval($_GPC["branchid"]);
goto HmvhI;
Up0HJ:
if (empty($catelist)) {
    goto sXmK6;
}
goto AAFVt;
RxliV:
if (empty($branch)) {
    goto nL_D3;
}
goto GOB_N;
XAmCP:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='serhome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto Up0HJ;
zZ47i:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    DcRPe:
}
goto jm3He;
s0QK_:
if (empty($list)) {
    goto Xl6or;
}
goto EwZqo;
HmvhI:
$branch = pdo_get($this->table_branch, array("id" => $branchid, "uniacid" => $_W["uniacid"]));
goto MutIz;
IWdc6:
goto QCV_i;
goto crBRE;
SoMmI:
foreach ($catenav as $k => $v) {
    $catenav[$k]["cicon"] = tomedia($v["cicon"]);
    r5QML:
}
goto K9pj9;
Z0qqY:
ChKYS:
goto nZuIY;
crBRE:
hwo3O:
goto r4Jsp;
FRsJL:
$this->result(0, '', $list);
goto xVGBN;
ZI8YR:
j640q:
goto HUpOU;
r4Jsp:
$catelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_sercate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto inSD0;
riPCh:
nL_D3:
goto U2oOd;
AAFVt:
foreach ($catelist as $k => $v) {
    $catelist[$k]["cicon"] = tomedia($v["cicon"]);
    qCdx4:
}
goto XIBTo;
nZuIY:
if (empty($slide)) {
    goto cczRe;
}
goto zZ47i;
K9pj9:
wcuzG:
goto Z0qqY;
WPDde:
Xl6or:
goto FRsJL;
GOB_N:
$par .= " tab.branchid in ( " . $branch["scort"] . " ) AND ";
goto riPCh;
LUY78:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto hbolw;
xVGBN:
QCV_i: