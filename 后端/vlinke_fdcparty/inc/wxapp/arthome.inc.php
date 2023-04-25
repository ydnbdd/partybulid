<?php

goto YWQ1U;
rxGBc:
if (empty($catenav)) {
    goto xRojP;
}
goto gxcKR;
xgXul:
$psize = max(1, intval($_GPC["psize"]));
goto LDzKZ;
CWoyv:
goto LS5cF;
goto yExyT;
yExyT:
cMo0R:
goto hLtr0;
hLtr0:
$catelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_artcate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto D7rD4;
YWQ1U:
global $_W, $_GPC;
goto eJeyl;
kAlWG:
TifL8:
goto FvV7R;
LLX1r:
LA0iJ:
goto Mt3g4;
c6Sv4:
CrtB7:
goto x1568;
Ih4Ed:
foreach ($list as $k => $v) {
    goto JltEN;
    yEH6m:
    $list[$k]["createtime"] = date("Y-m-d H:i", $v["createtime"]);
    goto BWvwP;
    BWvwP:
    bSu9o:
    goto vv6C9;
    JltEN:
    $list[$k]["tilpic"] = tomedia($v["tilpic"]);
    goto yEH6m;
    vv6C9:
}
goto R8RdF;
hPoXR:
$this->result(0, '', $list);
goto bsQvm;
ztjMs:
kVezu:
goto rxGBc;
p16dx:
xkjFQ:
goto ztjMs;
qre0B:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    BLsXX:
}
goto ugbPB;
wwI9_:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='arthome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto pDj6k;
pDj6k:
if (empty($catelist)) {
    goto kVezu;
}
goto vbKWN;
LDzKZ:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_article) . " WHERE status=2 AND uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto DxWHC;
eJeyl:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto Mk7DC;
R8RdF:
Wpopf:
goto Scwqt;
DxWHC:
if (empty($list)) {
    goto Yf4Ls;
}
goto Ih4Ed;
Mt3g4:
$pindex = max(1, intval($_GPC["pindex"]));
goto xgXul;
D7rD4:
$catenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_artcate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto wwI9_;
BXQ7q:
if (empty($slide)) {
    goto TifL8;
}
goto qre0B;
FvV7R:
$this->result(0, '', array("catenav" => $catenav, "catelist" => $catelist, "slide" => $slide));
goto kg4if;
gxcKR:
foreach ($catenav as $k => $v) {
    $catenav[$k]["cicon"] = tomedia($v["cicon"]);
    t7hzm:
}
goto c6Sv4;
vbKWN:
foreach ($catelist as $k => $v) {
    $catelist[$k]["cicon"] = tomedia($v["cicon"]);
    tKfn1:
}
goto p16dx;
kg4if:
goto LS5cF;
goto LLX1r;
HUpHU:
if ($op == "getmore") {
    goto LA0iJ;
}
goto CWoyv;
x1568:
xRojP:
goto BXQ7q;
Mk7DC:
if ($op == "display") {
    goto cMo0R;
}
goto HUpHU;
ugbPB:
L7pOr:
goto kAlWG;
Scwqt:
Yf4Ls:
goto hPoXR;
bsQvm:
LS5cF: