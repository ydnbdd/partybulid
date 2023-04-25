<?php

goto MgCqK;
TA49y:
if ($op == "getmore") {
    goto GyNH7;
}
goto Jdmzp;
o81iH:
$psize = 20;
goto FRIY9;
IINwl:
$user = $this->getUser($param["openart"]);
goto zdjkZ;
BfxoO:
$branch = pdo_getall($this->table_branch, array("id" => $branchidarr, "uniacid" => $_W["uniacid"]), '', "id");
goto iU4fL;
x33do:
$branchidarr = array_column($list, "branchid");
goto BfxoO;
FRIY9:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_article) . " WHERE status=2 AND uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto vOSfn;
dGA7l:
goto V5Lp0;
goto IT372;
g69Pu:
XkclH:
goto x33do;
uhv1q:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='arthome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto fkXtq;
EA42V:
$param = $this->getParam();
goto IINwl;
g2dY3:
$artcatenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_artcate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto dGA7l;
vOSfn:
if (!empty($list)) {
    goto XkclH;
}
goto VB1YX;
C60Vd:
$pindex = max(1, intval($_GPC["page"]));
goto o81iH;
MgCqK:
global $_W, $_GPC;
goto hhtc2;
zdjkZ:
if ($op == "display") {
    goto MdvMN;
}
goto TA49y;
IT372:
GyNH7:
goto C60Vd;
hhtc2:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto EA42V;
Jdmzp:
goto V5Lp0;
goto hQWVj;
VB1YX:
exit("NOTHAVE");
goto g69Pu;
iU4fL:
V5Lp0:
goto yGH5H;
hQWVj:
MdvMN:
goto uhv1q;
fkXtq:
$artcatelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_artcate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto g2dY3;
yGH5H:
include $this->template("arthome");