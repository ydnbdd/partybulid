<?php

global $_W, $_GPC;
load()->func('tpl');
$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
if ($op == 'display') {
    $con = " WHERE uniacid=:uniacid ";
    $par[':uniacid'] = $_W['uniacid'];
    $keywords = trim($_GPC['keywords']);
    if (!empty($keywords)) {
        $con .= " AND title LIKE :keywords ";
        $par[':keywords'] = '%' . $keywords . '%';
    }
    $ptype = intval($_GPC['ptype']);
    if ($ptype != 0) {
        $con .= " AND ptype=:ptype ";
        $par[':ptype'] = $ptype;
    }
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $list = pdo_fetchall('SELECT * FROM ' . tablename($this->table_votproject) . $con . ' ORDER BY priority DESC, id DESC LIMIT ' . ($pindex - 1) * $psize . ',' . $psize, $par);
    $total = pdo_fetchcolumn('SELECT count(id) FROM ' . tablename($this->table_votproject) . $con, $par);
    $pager = pagination($total, $pindex, $psize);
} elseif ($op == 'post') {
    $id = intval($_GPC['id']);
    $votproject = pdo_get($this->table_votproject, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (checksubmit('submit')) {
        $data = array('uniacid' => $_W['uniacid'], 'title' => trim($_GPC['title']), 'starttime' => strtotime($_GPC['datelimit']['start']), 'endtime' => strtotime($_GPC['datelimit']['end']), 'tilpic' => trim($_GPC['tilpic']), 'picall' => iserializer($_GPC['picall']), 'ptype' => intval($_GPC['ptype']), 'minnumber' => intval($_GPC['minnumber']), 'maxnumber' => intval($_GPC['maxnumber']), 'details' => $_GPC['details'], 'priority' => intval($_GPC['priority']));
        if (!empty($id)) {
            pdo_update($this->table_votproject, $data, array('id' => $id));
        } else {
            pdo_insert($this->table_votproject, $data);
        }
        message('信息更新成功！', $this->createWebUrl('votproject'), 'success');
    }
    if (empty($votproject)) {
        $votproject = array('starttime' => time(), 'endtime' => time() + 7 * 86400, 'picall' => array(), 'ptype' => 1, 'minnumber' => 0, 'maxnumber' => 0, 'priority' => 0);
    } else {
        $votproject['picall'] = iunserializer($votproject['picall']);
    }
} elseif ($op == 'delete') {
    $id = intval($_GPC['id']);
    $votproject = pdo_get($this->table_votproject, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($votproject)) {
        message('要删除的项目不存在或是已经被删除！', referer(), 'error');
    }
    pdo_delete($this->table_votitem, array('projectid' => $id, 'uniacid' => $_W['uniacid']));
    pdo_delete($this->table_votlog, array('projectid' => $id, 'uniacid' => $_W['uniacid']));
    $result = pdo_delete($this->table_votproject, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (!empty($result)) {
        message("数据删除成功！", referer(), 'success');
    }
    message("数据删除失败，请刷新页面重试！", referer(), 'error');
}
include $this->template('votproject');