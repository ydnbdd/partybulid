<?php

goto KD232;
vbGFO:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto pdjyX;
htqTw:
if (!($op == "display")) {
    goto Uz9lK;
}
goto l91kp;
W7k8j:
$exaanswer = pdo_fetch("SELECT a.*,p.title FROM " . tablename($this->table_exaanswer) . " a LEFT JOIN " . tablename($this->table_exapaper) . " p ON a.paperid=p.id WHERE a.status=2 AND a.userid=:userid AND a.uniacid=:uniacid ORDER BY a.id DESC LIMIT 1 ", array(":userid" => $user["id"], ":uniacid" => $_W["uniacid"]));
goto BkNzz;
pdjyX:
$param = $this->getParam();
goto UbSxz;
LwFsN:
Uz9lK:
goto AZlBv;
NowZO:
$exadayall = pdo_fetchall("SELECT * FROM " . tablename($this->table_exaday) . " WHERE userid=:userid AND uniacid=:uniacid ORDER BY id DESC LIMIT 7 ", array(":userid" => $user["id"], ":uniacid" => $_W["uniacid"]));
goto LwFsN;
BkNzz:
$exapaperall = pdo_fetchall("SELECT p.*,a.status FROM " . tablename($this->table_exapaper) . " p LEFT JOIN " . tablename($this->table_exaanswer) . " a ON p.id=a.paperid WHERE p.uniacid=:uniacid AND a.userid=:userid AND p.starttime<=:starttime ORDER BY p.endtime DESC LIMIT 2 ", array(":uniacid" => $_W["uniacid"], ":starttime" => time(), ":userid" => $user["id"]));
goto NowZO;
UbSxz:
$user = $this->getUser();
goto htqTw;
l91kp:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='exahome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto W7k8j;
KD232:
global $_W, $_GPC;
goto vbGFO;
AZlBv:
include $this->template("exahome");