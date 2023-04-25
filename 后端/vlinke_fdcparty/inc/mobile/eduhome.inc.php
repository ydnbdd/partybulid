<?php

goto IlA5I;
LeP98:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto E63VA;
wMo6t:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_edulesson) . " WHERE status IN (1,2) AND uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]), "id");
goto MKtKX;
UXTWr:
FEAnL:
goto n6cU6;
sk5QD:
bdx8X:
goto RLR1A;
ARC7T:
AwoE1:
goto Mj_w3;
rTRo2:
$edustudy = pdo_fetchall("SELECT * FROM " . tablename($this->table_edustudy) . " WHERE lessonid IN (" . $keysstr . ") AND userid=:userid AND uniacid=:uniacid ", array(":userid" => $user["id"], ":uniacid" => $_W["uniacid"]), "lessonid");
goto UXTWr;
f1Hmo:
$edustudy = pdo_fetchall("SELECT s.*,u.nickname,u.realname,u.mobile,u.headpic,l.title FROM " . tablename($this->table_edustudy) . " s LEFT JOIN " . tablename($this->table_user) . " u ON s.userid=u.id LEFT JOIN " . tablename($this->table_edulesson) . " l ON s.lessonid=l.id WHERE s.status=2 AND s.uniacid=:uniacid ORDER BY s.id DESC LIMIT 20 ", array(":uniacid" => $_W["uniacid"]));
goto peHh9;
MKtKX:
if (!empty($list)) {
    goto AwoE1;
}
goto HMpxE;
IlA5I:
global $_W, $_GPC;
goto LeP98;
LTGdF:
$psize = 20;
goto wMo6t;
Mj_w3:
$keys = array_keys($list);
goto b8Pky;
b8Pky:
$keysstr = implode(",", $keys);
goto rTRo2;
HMpxE:
exit("NOTHAVE");
goto ARC7T;
peHh9:
$edulessontol = pdo_fetchall("SELECT count(id) as tol, stustatus FROM " . tablename($this->table_edulesson) . " WHERE status IN (1,2) AND uniacid=:uniacid GROUP BY stustatus ", array(":uniacid" => $_W["uniacid"]), "stustatus");
goto PUDTu;
p98UV:
if ($op == "getmore") {
    goto rHvvH;
}
goto Z9P7J;
GiKKQ:
$pindex = max(1, intval($_GPC["page"]));
goto LTGdF;
z4TPX:
$educatelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_educate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto FZ1e2;
PUDTu:
goto FEAnL;
goto WPAQM;
WPAQM:
rHvvH:
goto GiKKQ;
RLR1A:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='eduhome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto z4TPX;
FZ1e2:
$educatenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_educate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto f1Hmo;
E63VA:
$param = $this->getParam();
goto uk0Wr;
Z9P7J:
goto FEAnL;
goto sk5QD;
uk0Wr:
$user = $this->getUser();
goto lbVGn;
lbVGn:
if ($op == "display") {
    goto bdx8X;
}
goto p98UV;
n6cU6:
include $this->template("eduhome");