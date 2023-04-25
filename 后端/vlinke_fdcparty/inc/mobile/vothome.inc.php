<?php

goto o1fzo;
kHPL_:
$psize = 20;
goto yV8Ww;
E4IEM:
exit("NOTHAVE");
goto TPVp2;
wrxL5:
goto bsRLV;
goto rN27c;
Le6u3:
if ($op == "getmore") {
    goto RoInb;
}
goto qmJTa;
WA3XG:
foreach ($list as $k => $v) {
    goto C7BUq;
    MLIhU:
    $list[$k]["starttime"] = date("Y-m-d H:i", $v["starttime"]);
    goto Z3TSR;
    WTmot:
    iH84f:
    goto F7C1i;
    C7BUq:
    $list[$k]["tilpic"] = tomedia($v["tilpic"]);
    goto MLIhU;
    Z3TSR:
    $list[$k]["endtime"] = date("Y-m-d H:i", $v["endtime"]);
    goto WTmot;
    F7C1i:
}
goto I67Va;
yV8Ww:
$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_votproject) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, array(":uniacid" => $_W["uniacid"]));
goto CJD58;
I67Va:
AMBCJ:
goto EHTqt;
TPVp2:
goto g3lNR;
goto nlh9m;
E13vE:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto BWJ5_;
thq8d:
if ($op == "display") {
    goto aPax3;
}
goto Le6u3;
EHTqt:
g3lNR:
goto RnNl1;
o1fzo:
global $_W, $_GPC;
goto E13vE;
qmJTa:
goto bsRLV;
goto SugWE;
twGcw:
$pindex = max(1, intval($_GPC["page"]));
goto kHPL_;
BWJ5_:
$param = $this->getParam();
goto v3vql;
nlh9m:
qhSLY:
goto WA3XG;
rN27c:
RoInb:
goto twGcw;
v3vql:
$user = $this->getUser();
goto thq8d;
SugWE:
aPax3:
goto wrxL5;
CJD58:
if (!empty($list)) {
    goto qhSLY;
}
goto E4IEM;
RnNl1:
bsRLV:
goto txYNt;
txYNt:
include $this->template("vothome");