<?php

goto pRnlS;
pbzPZ:
$user = $this->getUser();
goto tkneV;
tkneV:
if ($op == "display") {
    goto KuZO9;
}
goto qZcDq;
mheER:
$branch = pdo_getall($this->table_branch, array("id" => $branchidarr, "uniacid" => $_W["uniacid"]), '', "id");
goto tMeVI;
o4amh:
KuZO9:
goto u4GMY;
qZcDq:
if ($op == "getmore") {
    goto dy7aL;
}
goto Z3kfc;
pRnlS:
global $_W, $_GPC;
goto CdK19;
WSq8J:
$psize = 20;
goto NmqJy;
rsA7v:
$branchidarr = array_column($list, "branchid");
goto mheER;
xoFIP:
goto VAdsw;
goto k0dWo;
MnHDR:
XvvnE:
goto rsA7v;
p5xsr:
$branch = $this->getBranch($user["branchid"]);
goto qRXpW;
tMeVI:
VAdsw:
goto DA3m3;
k0dWo:
dy7aL:
goto p5xsr;
qRXpW:
$pindex = max(1, intval($_GPC["page"]));
goto WSq8J;
u4GMY:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='acthome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto mBur5;
CdK19:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto e1Ois;
e1Ois:
$param = $this->getParam();
goto pbzPZ;
Z3kfc:
goto VAdsw;
goto o4amh;
rH6uB:
if (!empty($list)) {
    goto XvvnE;
}
goto tlHHj;
mBur5:
$actenroll = pdo_fetchall("SELECT e.*,u.nickname,u.realname,u.mobile,u.headpic,a.title FROM " . tablename($this->table_actenroll) . " e LEFT JOIN " . tablename($this->table_user) . " u ON e.userid=u.id LEFT JOIN " . tablename($this->table_activity) . " a ON e.activityid=a.id WHERE e.uniacid=:uniacid ORDER BY e.id LIMIT 20 ", array(":uniacid" => $_W["uniacid"]));
goto xoFIP;
tlHHj:
exit("NOTHAVE");
goto MnHDR;
NmqJy:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_activity) . " WHERE branchid in ( " . $branch["scort"] . " ) AND status IN (2,3) AND uniacid=:uniacid ORDER BY status ASC, priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto rH6uB;
DA3m3:
include $this->template("acthome");