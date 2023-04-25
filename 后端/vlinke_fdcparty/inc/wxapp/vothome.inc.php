<?php

goto Zm8Nw;
OTMke:
ti8ZB:
goto NDfnq;
ByDi3:
goto uF_LA;
goto OTMke;
iSkaF:
if ($op == "display") {
    goto ti8ZB;
}
goto f6Qfo;
P3B31:
$psize = max(1, intval($_GPC["psize"]));
goto ikBUZ;
f6Qfo:
if ($op == "getmore") {
    goto FydbY;
}
goto ByDi3;
NDfnq:
goto uF_LA;
goto UZ2Vh;
nZyOu:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto iSkaF;
UZ2Vh:
FydbY:
goto KI90N;
ikBUZ:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_votproject) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto ZF08H;
Z3kU_:
uajle:
goto hft8g;
KI90N:
$pindex = max(1, intval($_GPC["pindex"]));
goto P3B31;
hft8g:
m_yE4:
goto Z_iIC;
Z_iIC:
$this->result(0, '', $list);
goto TJ4ln;
wu54Q:
foreach ($list as $k => $v) {
    goto LtMSc;
    LiswC:
    TIIsU:
    goto WwJD_;
    LtMSc:
    $list[$k]["tilpic"] = tomedia($v["tilpic"]);
    goto QKdQz;
    cjzaz:
    $list[$k]["endtime"] = date("Y-m-d H:i", $v["endtime"]);
    goto LiswC;
    QKdQz:
    $list[$k]["starttime"] = date("Y-m-d H:i", $v["starttime"]);
    goto cjzaz;
    WwJD_:
}
goto Z3kU_;
Zm8Nw:
global $_W, $_GPC;
goto nZyOu;
ZF08H:
if (empty($list)) {
    goto m_yE4;
}
goto wu54Q;
TJ4ln:
uF_LA: