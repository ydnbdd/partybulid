<?php

goto qjYkB;
vhNQE:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto dOSqi;
dOSqi:
$param = $this->getParam();
goto Gl_WR;
qjYkB:
global $_W, $_GPC;
goto vhNQE;
wRc8z:
oe8dp:
goto h9gAL;
VvT8S:
$psize = 20;
goto ngfIC;
PkSJm:
HB1we:
goto eKt07;
h9gAL:
$branch = $this->getBranch($user["branchid"]);
goto QEczU;
eKt07:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='serhome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto iCJrn;
ngfIC:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_seritem) . " WHERE branchid in ( " . $branch["scort"] . " ) AND status IN (2,3) AND uniacid=:uniacid ORDER BY status ASC, priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto Oqb93;
saQKh:
$branch = pdo_getall($this->table_branch, array("id" => $branchidarr, "uniacid" => $_W["uniacid"]), '', "id");
goto ah71U;
rgt2m:
goto kM3Dp;
goto wRc8z;
RnpKq:
goto kM3Dp;
goto PkSJm;
ah71U:
kM3Dp:
goto wm_ph;
Rtpl5:
if ($op == "getmore") {
    goto oe8dp;
}
goto RnpKq;
Gl_WR:
$user = $this->getUser();
goto Ew9fU;
Ew9fU:
if ($op == "display") {
    goto HB1we;
}
goto Rtpl5;
rdPkz:
exit("NOTHAVE");
goto bDLiA;
iCJrn:
$sercatelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_sercate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]), "id");
goto sCjzj;
QEczU:
$pindex = max(1, intval($_GPC["page"]));
goto VvT8S;
Oqb93:
if (!empty($list)) {
    goto FGd89;
}
goto rdPkz;
sCjzj:
$sercatenav = pdo_fetchall("SELECT * FROM " . tablename($this->table_sercate) . " WHERE navnumber>0 AND uniacid=:uniacid ORDER BY navnumber DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto rgt2m;
IM9mb:
$branchidarr = array_column($list, "branchid");
goto saQKh;
bDLiA:
FGd89:
goto IM9mb;
wm_ph:
include $this->template("serhome");