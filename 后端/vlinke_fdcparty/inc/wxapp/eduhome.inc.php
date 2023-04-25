<?php

goto Atio3;
EqNMg:
gGjGD:
goto AD5Ja;
JDoxG:
foreach ($catenav as $k => $v) {
    $catenav[$k]["cicon"] = tomedia($v["cicon"]);
    VNuRs:
}
goto mu_O2;
Ay3qf:
p_7KL:
goto uT50X;
WV5vd:
goto NqrQ4;
goto EqNMg;
hdz6C:
Y9Qq8:
goto ezSO8;
AOg4k:
$this->result(0, '', array("catenav" => $catenav, "catelist" => $catelist, "slide" => $slide, "edustudy" => $edustudy, "edulessontol" => $edulessontol));
goto WV5vd;
DQeLk:
$psize = max(1, intval($_GPC["psize"]));
goto aNm6S;
RgGHb:
gTooG:
goto NZI_E;
ULMZ_:
if (empty($slide)) {
    goto I1Efu;
}
goto Fnkyd;
uT50X:
I1Efu:
goto DoiWf;
tTuBE:
foreach ($edustudy as $k => $v) {
    $edustudy[$k]["headpic"] = tomedia($v["headpic"]);
    Iz0Gi:
}
goto e8QqB;
DoiWf:
if (empty($edustudy)) {
    goto qJyEG;
}
goto tTuBE;
Rbl48:
qJyEG:
goto AOg4k;
ezSO8:
$catenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_educate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto BMOSD;
pRLpE:
$edulessontol[2] = intval($edulessontolarr[2]["tol"]);
goto ZwQyw;
e8QqB:
b6900:
goto Rbl48;
Ag68u:
if ($op == "getmore") {
    goto gGjGD;
}
goto iYwAi;
miOJ9:
$this->result(0, '', $list);
goto spXxH;
iYwAi:
goto NqrQ4;
goto hdz6C;
Ux5Qx:
$edustudy = pdo_fetchall("SELECT s.*,u.realname,u.headpic,l.title FROM " . tablename($this->table_edustudy) . " s LEFT JOIN " . tablename($this->table_user) . " u ON s.userid=u.id LEFT JOIN " . tablename($this->table_edulesson) . " l ON s.lessonid=l.id WHERE s.status=2 AND s.uniacid=:uniacid ORDER BY s.id DESC LIMIT 20 ", array(":uniacid" => $_W["uniacid"]));
goto Dw39Z;
v3kES:
$lessonidarr = array_column($list, "id");
goto TjxDZ;
BMOSD:
$catelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_educate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto hOuUB;
nXLpn:
vWqw0:
goto AH4ms;
AD5Ja:
$pindex = max(1, intval($_GPC["pindex"]));
goto DQeLk;
NZI_E:
Exu59:
goto miOJ9;
Nj80E:
$userid = intval($_GPC["userid"]);
goto r_HFV;
AH4ms:
if (empty($catenav)) {
    goto L9o1V;
}
goto JDoxG;
BxrrU:
$edulessontol[1] = intval($edulessontolarr[1]["tol"]);
goto pRLpE;
ZwQyw:
if (empty($catelist)) {
    goto vWqw0;
}
goto nZMyf;
mu_O2:
Mz7_L:
goto ytkjw;
ytkjw:
L9o1V:
goto ULMZ_;
EOE04:
foreach ($list as $k => $v) {
    goto Nd29u;
    InA7x:
    dvQfP:
    goto gSDyu;
    Nd29u:
    $list[$k]["tilpic"] = tomedia($v["tilpic"]);
    goto xZHtD;
    xZHtD:
    $list[$k]["createtime"] = date("Y-m-d H:i", $v["createtime"]);
    goto tH24t;
    cRLN8:
    $list[$k]["studystatus"] = $edustudy[$v["id"]]["status"] == 1 ? "学习中" : "已完成";
    goto fdJGr;
    fdJGr:
    goto ujoDs;
    goto InA7x;
    tH24t:
    if (empty($edustudy[$v["id"]])) {
        goto dvQfP;
    }
    goto cRLN8;
    bYRK0:
    SnRok:
    goto vneXE;
    gSDyu:
    $list[$k]["studystatus"] = "未开始";
    goto ZarmZ;
    ZarmZ:
    ujoDs:
    goto bYRK0;
    vneXE:
}
goto RgGHb;
Atio3:
global $_W, $_GPC;
goto Q22Lz;
Q22Lz:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto kW08K;
TjxDZ:
$lessonidstr = implode(",", $lessonidarr);
goto h0hjQ;
nZMyf:
foreach ($catelist as $k => $v) {
    $catelist[$k]["cicon"] = tomedia($v["cicon"]);
    fBsEF:
}
goto cP8JX;
kW08K:
if ($op == "display") {
    goto Y9Qq8;
}
goto Ag68u;
Fnkyd:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    c3R8L:
}
goto Ay3qf;
r_HFV:
if (empty($list)) {
    goto Exu59;
}
goto v3kES;
aNm6S:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_edulesson) . " WHERE status IN (1,2) AND uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto Nj80E;
Dw39Z:
$edulessontolarr = pdo_fetchall("SELECT count(id) as tol, stustatus FROM " . tablename($this->table_edulesson) . " WHERE status IN (1,2) AND uniacid=:uniacid GROUP BY stustatus ", array(":uniacid" => $_W["uniacid"]), "stustatus");
goto BxrrU;
hOuUB:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='eduhome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto Ux5Qx;
cP8JX:
v_3K3:
goto nXLpn;
h0hjQ:
$edustudy = pdo_fetchall("SELECT * FROM " . tablename($this->table_edustudy) . " WHERE lessonid IN (" . $lessonidstr . ") AND userid=:userid AND uniacid=:uniacid ", array(":userid" => $userid, ":uniacid" => $_W["uniacid"]), "lessonid");
goto EOE04;
spXxH:
NqrQ4: