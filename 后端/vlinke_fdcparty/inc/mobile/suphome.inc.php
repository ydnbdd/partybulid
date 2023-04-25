<?php

goto atCwS;
lIE4X:
if (!($op == "display")) {
    goto QqPNr;
}
goto Dw5aP;
ftasl:
$param = $this->getParam();
goto OrrRI;
Dw5aP:
$slide = pdo_fetchall("SELECT * FROM " . tablename($this->table_slide) . " WHERE position='suphome' AND uniacid=:uniacid ORDER BY priority DESC, id DESC", array(":uniacid" => $_W["uniacid"]));
goto aIbb9;
cm3d7:
$op = $_GPC["op"] ? $_GPC["op"] : "display";
goto ftasl;
OrrRI:
$user = $this->getUser();
goto lIE4X;
aIbb9:
QqPNr:
goto anDKP;
atCwS:
global $_W, $_GPC;
goto cm3d7;
anDKP:
include $this->template("suphome");