<?php

goto kJPiJ;
SMxeN:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto F8BdU;
gzhv4:
if (empty($branch)) {
    goto EDl2y;
}
goto ZZ7W2;
Y2dmM:
$exapaper = pdo_fetchall("SELECT * FROM " . tablename($this->table_exapaper) . " WHERE uniacid=:uniacid AND starttime<=:starttime ORDER BY endtime DESC LIMIT 6 ", array(":uniacid" => $_W["uniacid"], ":starttime" => time()));
goto wXQ4K;
g8g35:
$param["homecon"] = iunserializer($param["homecon"]);
goto Tr9C8;
kJPiJ:
global $_W, $_GPC;
goto SMxeN;
kAyd1:
$article = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_article) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE tab.status=2 AND tab.uniacid=:uniacid ORDER BY tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto uST0S;
YSD_6:
$userpar = '';
goto x2ab1;
SLVfO:
EDl2y:
goto HI9p3;
cIWqQ:
$activity = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_activity) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE " . $userpar . " tab.status IN (2,3) AND tab.uniacid=:uniacid ORDER BY tab.status ASC, tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto BMrXm;
BMrXm:
$seritem = pdo_fetchall("SELECT tab.*,b.name FROM " . tablename($this->table_seritem) . " tab LEFT JOIN " . tablename($this->table_branch) . " b ON tab.branchid=b.id WHERE " . $userpar . " tab.status IN (2,3) AND tab.uniacid=:uniacid ORDER BY tab.status ASC, tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto Y2dmM;
F8BdU:
$param = $this->getParam();
goto BBWCU;
x2ab1:
if (empty($user)) {
    goto xkloS;
}
goto NPEBH;
PxDjB:
$user = $this->getUser($param["openhome"]);
goto YSD_6;
HI9p3:
xkloS:
goto Ip55c;
NPEBH:
$branch = pdo_get($this->table_branch, array("id" => $user["branchid"]));
goto gzhv4;
Ip55c:
$notice = pdo_fetchall("SELECT tab.* FROM " . tablename($this->table_notice) . " tab WHERE " . $userpar . " tab.uniacid=:uniacid ORDER BY tab.priority DESC, tab.id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]));
goto cIWqQ;
Tr9C8:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='home' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto kAyd1;
uST0S:
$edulesson = pdo_fetchall("SELECT * FROM " . tablename($this->table_edulesson) . " WHERE status IN (1,2) AND uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT 10 ", array(":uniacid" => $_W["uniacid"]), "id");
goto PxDjB;
BBWCU:
$param["homenav"] = iunserializer($param["homenav"]);
goto g8g35;
ZZ7W2:
$userpar = " tab.branchid in ( " . $branch["scort"] . " ) AND ";
goto SLVfO;
wXQ4K:
include $this->template("home");