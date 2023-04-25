<?php

goto T19Zy;
hjysi:
if (empty($exapaperall)) {
    goto bGS30;
}
goto JE2zI;
ayhSo:
Ksuuh:
goto RLxwJ;
FADld:
if (empty($exaanswer)) {
    goto Bn0Qs;
}
goto kewAB;
FlWAL:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    NKnVt:
}
goto b5alH;
OUfsj:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='exahome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto VX27j;
mccEi:
$userid = intval($_GPC["userid"]);
goto dZQ9K;
Yw0yV:
$exaanswer["stime"] = date("Y-m-d H:i", $exaanswer["stime"]);
goto Elny9;
VX27j:
if (empty($slide)) {
    goto Ksuuh;
}
goto FlWAL;
RLxwJ:
$this->result(0, '', array("slide" => $slide, "exaanswer" => $exaanswer, "exapaperall" => $exapaperall, "exadayall" => $exadayall));
goto GRHG6;
dZQ9K:
$exaanswer = pdo_fetch("SELECT a.*,p.title FROM " . tablename($this->table_exaanswer) . " a LEFT JOIN " . tablename($this->table_exapaper) . " p ON a.paperid=p.id WHERE a.status=2 AND a.userid=:userid AND a.uniacid=:uniacid ORDER BY a.id DESC LIMIT 1 ", array(":userid" => $userid, ":uniacid" => $_W["uniacid"]));
goto FADld;
H6kpk:
if (!($op == "display")) {
    goto eYNIU;
}
goto mccEi;
J0Rag:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto H6kpk;
J8L42:
$exapaperall = pdo_fetchall("SELECT p.*,a.status FROM " . tablename($this->table_exapaper) . " p LEFT JOIN " . tablename($this->table_exaanswer) . " a ON p.id=a.paperid WHERE a.userid=:userid AND p.uniacid=:uniacid AND p.starttime<=:starttime ORDER BY p.endtime DESC LIMIT 2 ", array(":userid" => $userid, ":uniacid" => $_W["uniacid"], ":starttime" => time()));
goto hjysi;
T19Zy:
global $_W, $_GPC;
goto fKZMs;
Elny9:
Bn0Qs:
goto J8L42;
fKZMs:
session_start();
goto J0Rag;
KdbE5:
$exaanswer["usertime"] = floor($usertime / 60) . "分" . $usertime % 60 . "秒";
goto Yw0yV;
C5le9:
R2UoV:
goto iRTWs;
JE2zI:
foreach ($exapaperall as $k => $v) {
    $exapaperall[$k]["endtime"] = date("Y-m-d H:i", $v["endtime"]);
    eb0Q_:
}
goto C5le9;
iRTWs:
bGS30:
goto wzfZJ;
wzfZJ:
$exadayall = pdo_fetchall("SELECT * FROM " . tablename($this->table_exaday) . " WHERE userid=:userid AND uniacid=:uniacid ORDER BY id DESC LIMIT 7 ", array(":userid" => $userid, ":uniacid" => $_W["uniacid"]));
goto OUfsj;
kewAB:
$usertime = $exaanswer["finishtime"] - $exaanswer["stime"];
goto KdbE5;
b5alH:
NQGjo:
goto ayhSo;
GRHG6:
eYNIU: