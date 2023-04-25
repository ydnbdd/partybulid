<?php

global $_W, $_GPC;
$op = $_GPC['op'] ? $_GPC['op'] : 'display';
if ($op == "display") {
    $id = intval($_GPC['id']);
    $votproject = pdo_get($this->table_votproject, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($votproject)) {
        $this->result(1, '投票活动信息不存在！');
    }
    if ($votproject['endtime'] > time()) {
        $orderby = 0;
    } else {
        $orderby = 1;
    }
    $canvote = 2;
    if ($votproject['endtime'] < time()) {
        $canvote = 3;
    } elseif ($votproject['starttime'] > time()) {
        $canvote = 1;
    }
    $votproject['details'] = str_replace('<img', '<img style="max-width:100%;height:auto" ', htmlspecialchars_decode($votproject['details']));
    $votproject['starttime'] = date("Y-m-d H:i", $votproject['starttime']);
    $votproject['endtime'] = date("Y-m-d H:i", $votproject['endtime']);
    $votproject['tilpic'] = tomedia($votproject['tilpic']);
    $votproject['picall'] = iunserializer($votproject['picall']);
    if (!empty($votproject['picall'])) {
        foreach ($votproject['picall'] as $key => $value) {
            $votproject['picall'][$key] = tomedia($value);
        }
    }
    $this->result(0, '', array('votproject' => $votproject, 'orderby' => $orderby, 'canvote' => $canvote));
} elseif ($op == "setvote") {
    $projectid = intval($_GPC['projectid']);
    $votproject = pdo_get($this->table_votproject, array('id' => $projectid, 'uniacid' => $_W['uniacid']));
    if (empty($votproject)) {
        $this->result(1, '投票活动信息不存在！');
    }
    if ($votproject['endtime'] < time()) {
        $this->result(1, '投票活动已结束！');
    } elseif ($votproject['starttime'] > time()) {
        $this->result(1, '投票活动还未开始！');
    }
    $userid = intval($_GPC['userid']);
    $votlog = pdo_get($this->table_votlog, array('projectid' => $projectid, 'userid' => $userid, 'uniacid' => $_W['uniacid']));
    if (!empty($votlog)) {
        $this->result(1, '您已投票过了！');
    }
    $itemval = $_GPC['itemval'];
    if (empty($itemval)) {
        $this->result(1, '请选择投票项！');
    }
    $itemvarr = explode(",", $itemval);
    if ($votproject['ptype'] == 2 && (count($itemvarr) < $votproject['minnumber'] || count($itemvarr) > $votproject['maxnumber'])) {
        $this->result(1, '本次投票活动最少要选择' . $votproject['minnumber'] . '项，最多不能超过' . $votproject['maxnumber'] . '项，请检查你的选项个数！');
    }
    foreach ($itemvarr as $key => $value) {
        $data = array('uniacid' => $_W['uniacid'], 'projectid' => $projectid, 'itemid' => $value, 'userid' => $userid, 'createtime' => time());
        pdo_insert($this->table_votlog, $data);
        $vnumber = pdo_getcolumn($this->table_votitem, array('id' => $value), 'vnumber');
        pdo_update($this->table_votitem, array('vnumber' => $vnumber + 1), array('id' => $value));
    }
    $this->result(0, '');
} elseif ($op == "getmore") {
    $con = " WHERE uniacid=:uniacid ";
    $par = array(':uniacid' => $_W['uniacid']);
    $projectid = intval($_GPC['projectid']);
    if ($projectid != 0) {
        $con .= " AND projectid=:projectid ";
        $par['projectid'] = $projectid;
    }
    $orderby = intval($_GPC['orderby']);
    if ($orderby == 1) {
        $con .= " ORDER BY vnumber DESC, itemno ASC, id ASC ";
    } else {
        $con .= " ORDER BY itemno ASC, id ASC ";
    }
    $pindex = max(1, intval($_GPC['pindex']));
    $psize = max(1, intval($_GPC['psize']));
    $list = pdo_fetchall("SELECT * FROM " . tablename($this->table_votitem) . $con . " LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $par);
    if (!empty($list)) {
        foreach ($list as $k => $v) {
            $list[$k]['tilpic'] = tomedia($v['tilpic']);
        }
    }
    $this->result(0, '', $list);
}