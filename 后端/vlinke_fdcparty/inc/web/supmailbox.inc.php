<?php

global $_W, $_GPC;
load()->func('tpl');
$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
if ($op == 'display') {
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $list = pdo_fetchall('SELECT s.*,u.realname as urealname,lu.realname as ulrealname FROM ' . tablename($this->table_supmailbox) . ' s LEFT JOIN ' . tablename($this->table_user) . ' u ON s.userid=u.id LEFT JOIN ' . tablename($this->table_user) . ' lu ON s.luserid=lu.id WHERE s.uniacid=:uniacid ORDER BY s.id DESC LIMIT ' . ($pindex - 1) * $psize . ',' . $psize, array(':uniacid' => $_W['uniacid']));
    $total = pdo_fetchcolumn('SELECT count(s.id) FROM ' . tablename($this->table_supmailbox) . ' s WHERE s.uniacid=:uniacid ', array(':uniacid' => $_W['uniacid']));
    $pager = pagination($total, $pindex, $psize);
} elseif ($op == 'post') {
    $id = intval($_GPC['id']);
    if (checksubmit('submit')) {
        $data = array('reply' => trim($_GPC['reply']), 'status' => intval($_GPC['status']));
        if (!empty($id)) {
            pdo_update($this->table_supmailbox, $data, array('id' => $id));
        }
        message('信息更新成功！', $this->createWebUrl('supmailbox', array('op' => 'display')), 'success');
    }
    $supmailbox = pdo_get($this->table_supmailbox, array('id' => $id, 'uniacid' => $_W['uniacid']));
    $user = pdo_get($this->table_user, array('id' => $supmailbox['userid'], 'uniacid' => $_W['uniacid']));
    $luser = pdo_get($this->table_user, array('id' => $supmailbox['luserid'], 'uniacid' => $_W['uniacid']));
} elseif ($op == 'delete') {
    $id = intval($_GPC['id']);
    $result = pdo_delete($this->table_supmailbox, array('id' => $id));
    if (!empty($result)) {
        message("数据删除成功！", referer(), 'success');
    }
    message("数据删除失败，请刷新页面重试！", referer(), 'error');
} elseif ($op == 'deleteall') {
    $idstr = implode(",", $_GPC['idArr']);
    $result = pdo_query("delete from " . tablename($this->table_supmailbox) . " WHERE id IN (" . $idstr . ")");
    if (!empty($result)) {
        exit("success");
    }
    exit("error");
}
include $this->template('supmailbox');