<?php

goto m4nCc;
NK0nc:
goto Cq5EF;
goto xO3pl;
y0EPA:
wYQ2O:
goto sDFl4;
r7g6B:
$user = $this->getUser();
goto dVTIc;
mh9nv:
RPNZq:
goto w1p10;
rUDE1:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto StovX;
uRB4b:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_malgoods) . " WHERE status=2 AND uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto HW2pR;
HW2pR:
if (!empty($list)) {
    goto RPNZq;
}
goto rDGtc;
m4nCc:
global $_W, $_GPC;
goto rUDE1;
w1p10:
Cq5EF:
goto qOX_Q;
dVTIc:
if ($op == "display") {
    goto wYQ2O;
}
goto qJBmw;
rDGtc:
exit("NOTHAVE");
goto mh9nv;
FiZy5:
goto Cq5EF;
goto y0EPA;
kkAz_:
$psize = 20;
goto uRB4b;
qJBmw:
if ($op == "getmore") {
    goto ghPQO;
}
goto FiZy5;
kjrGV:
$pindex = max(1, intval($_GPC["page"]));
goto kkAz_;
StovX:
$param = $this->getParam();
goto r7g6B;
xO3pl:
ghPQO:
goto kjrGV;
aqYhs:
$malcatelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_malcate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto flfNW;
sDFl4:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='malhome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto aqYhs;
flfNW:
$malcatenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_malcate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto NK0nc;
qOX_Q:
include $this->template("malhome");