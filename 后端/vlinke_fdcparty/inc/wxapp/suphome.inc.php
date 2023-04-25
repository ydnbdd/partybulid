<?php

goto NK2YX;
y99qX:
$this->result(0, '', array("slide" => $slide));
goto WkyiF;
xWqC8:
if (empty($slide)) {
    goto XxM1q;
}
goto nhw0V;
T6o5O:
if (!($op == "display")) {
    goto ONaAL;
}
goto YxUHI;
JeznE:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto T6o5O;
awczT:
XxM1q:
goto y99qX;
Ty_Nx:
Rju3B:
goto awczT;
YxUHI:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='suphome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto xWqC8;
nhw0V:
foreach ($slide as $k => $v) {
    $slide[$k]["tilpic"] = tomedia($v["tilpic"]);
    S0eNx:
}
goto Ty_Nx;
NK2YX:
global $_W, $_GPC;
goto JeznE;
WkyiF:
ONaAL: