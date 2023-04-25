<?php

global $_W, $_GPC;
$op = $_GPC['op'] ? $_GPC['op'] : 'display';
$param = $this->getParam();
$user = $this->getUser();
if ($op == "display") {
    $id = intval($_GPC['id']);
    $malgoods = pdo_get($this->table_malgoods, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($malgoods)) {
        message("商品信息不存在！", referer(), "error");
    }
    $malgoods['tilpic'] = tomedia($malgoods['tilpic']);
    $malgoods['bander'] = iunserializer($malgoods['bander']);
} elseif ($op == "setgoods") {
    $ret = array('ret' => 'error', 'msg' => 'error');
    $goodsid = intval($_GPC['goodsid']);
    $malgoods = pdo_get($this->table_malgoods, array('id' => $goodsid, 'uniacid' => $_W['uniacid']));
    if (empty($malgoods)) {
        $ret['msg'] = "商品信息不存在！";
        exit(json_encode($ret));
    }
    if ($malgoods['integral'] > $user['integral']) {
        $ret['msg'] = "积分不足，不能兑换该商品！";
        exit(json_encode($ret));
    }
    $logdata = array('uniacid' => $_W['uniacid'], 'goodsid' => $goodsid, 'userid' => $user['id'], 'integral' => $malgoods['integral'], 'title' => $malgoods['title'], 'tilpic' => $malgoods['tilpic'], 'status' => 1, 'createtime' => time(), 'updatetime' => 0);
    pdo_insert($this->table_mallog, $logdata);
    $logid = pdo_insertid();
    $data = array('userid' => $user['id'], 'channel' => "mallog", 'foreignid' => $logid, 'integral' => 0 - $malgoods['integral'], 'remark' => "兑换商品“" . $malgoods['title'] . "”扣除");
    $this->setIntegral($data, 0);
    $ret['ret'] = 'success';
    $ret['msg'] = "兑换成功，请尽快领取。";
    exit(json_encode($ret));
}
include $this->template('malgoods');