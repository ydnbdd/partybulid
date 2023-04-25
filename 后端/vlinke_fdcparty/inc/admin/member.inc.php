<?php

load()->func('tpl');
if ($op == 'display') {
    $con = ' WHERE m.uniacid=:uniacid AND m.recycle=0 AND m.branchid IN (' . $branchidstr . ') ';
    $par[':uniacid'] = $_W['uniacid'];
    $keyword = $_GPC['keyword'];
    if (!empty($keyword)) {
        $condition .= " AND ( m.nickname LIKE :keyword OR m.realname LIKE :keyword OR m.mobile LIKE :keyword ) ";
        $par[':keyword'] = "%" . $keyword . "%";
    }
    $branchid = intval($_GPC['branchid']);
    if ($branchid != 0) {
        $con .= " AND m.branchid=:branchid ";
        $par[':branchid'] = $branchid;
        $branch = pdo_get($this->table_branch, array('id' => $branchid, 'uniacid' => $_W['uniacid']));
    }
    $status = intval($_GPC['status']);
    if ($status != 0) {
        $con .= " AND m.status=:status ";
        $par[':status'] = $status;
    }
    $ulevel = intval($_GPC['ulevel']);
    if ($ulevel != 0) {
        $con .= " AND m.ulevel=:ulevel ";
        $par[':ulevel'] = $ulevel;
    }
    $pindex = max(1, intval($_GPC['page']));
    $psize = 50;
    $list = pdo_fetchall("SELECT m.*,b.name FROM " . tablename($this->table_member) . " m LEFT JOIN " . tablename($this->table_branch) . " b ON m.branchid=b.id " . $con . " ORDER BY m.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, $par);
    $total = pdo_fetchcolumn('SELECT count(m.id) FROM ' . tablename($this->table_member) . " m " . $con, $par);
    $pager = pagination($total, $pindex, $psize);
    if ($_GPC['output'] == 1) {
        $list_out = pdo_fetchall("SELECT m.*,b.name FROM " . tablename($this->table_member) . " m LEFT JOIN " . tablename($this->table_branch) . " b ON m.branchid=b.id " . $con . " ORDER BY m.id DESC", $par);
        $ulevelarr = array(1 => "正式党员", 2 => "预备党员", 3 => "观察对象", 3 => "入党积极分子");
        $statusarr = array(1 => "审核", 2 => "正常", 3 => "禁用");
        foreach ($list_out as $k => $v) {
            $data[$k] = array('id' => $v['id'], 'branch' => $v['name'], 'openid' => $v['openid'], 'nickname' => $v['nickname'], 'realname' => $v['realname'], 'idnumber' => $v['idnumber'] . "\t", 'mobile' => $v['mobile'] . "\t", 'status' => $statusarr[$v['status']], 'integral' => $v['integral'], 'ulevel' => $ulevelarr[$v['ulevel']], 'partyday' => $v['partyday'] . "\t", 'partypost' => $v['partypost'], 'birthday' => $v['birthday'] . "\t", 'sex' => $v['sex'] == 1 ? "男" : "女", 'origin' => $v['origin'], 'nation' => $v['nation'], 'education' => $v['education'], 'createtime' => date('Y-m-d H:i:s', $v['createtime']) . "\t", 'priority' => $v['priority']);
        }
        $arrhead = array("ID", "组织关系", "OpenID", "昵称", "姓名", "身份证号", "手机号", "状态", "积分", "政治身份", "入党日期", "党内职务", "出生日期", "性别", "籍贯", "民族", "文化程度", "创建时间", "排序ID");
        export_excel($data, $arrhead, time());
        exit;
    }
} elseif ($op == 'post') {
    $id = intval($_GPC['id']);
    if (checksubmit('submit')) {
        $branchid = intval($_GPC['branchid']);
        $realname = trim($_GPC['realname']);
        $idnumber = trim($_GPC['idnumber']);
        $mobile = trim($_GPC['mobile']);
        if ($branchid == 0) {
            message('请先选择所属组织！', '', 'error');
        }
        if (empty($realname) || empty($mobile) || empty($idnumber)) {
            message('姓名、身份证号和手机号均不能为空！', '', 'error');
        }
        $havemember = pdo_fetch("SELECT * FROM " . tablename($this->table_member) . " WHERE (idnumber=:idnumber OR mobile=:mobile) AND uniacid=:uniacid AND id<>:id AND recycle=0 ", array(':idnumber' => $idnumber, ':mobile' => $mobile, ':uniacid' => $_W['uniacid'], ':id' => $id));
        if (!empty($haveuser)) {
            message('身份证号或手机号已存在，请换个用户名或手机号！', '', 'error');
        }
        $data = array('uniacid' => $_W['uniacid'], 'branchid' => $branchid, 'openid' => trim($_GPC['openid']), 'nickname' => trim($_GPC['nickname']), 'headimgurl' => trim($_GPC['headimgurl']), 'realname' => $realname, 'idnumber' => $idnumber, 'mobile' => $mobile, 'headpic' => trim($_GPC['headpic']), 'status' => intval($_GPC['status']), 'ulevel' => intval($_GPC['ulevel']), 'partyday' => trim($_GPC['partyday']), 'partypost' => trim($_GPC['partypost']), 'birthday' => trim($_GPC['birthday']), 'sex' => intval($_GPC['sex']), 'origin' => trim($_GPC['origin']), 'nation' => trim($_GPC['nation']), 'education' => trim($_GPC['education']), 'priority' => intval($_GPC['priority']), 'recycle' => 0);
        if ($id == 0) {
            $data['integral'] = 0;
            $data['createtime'] = time();
            pdo_insert($this->table_member, $data);
        } else {
            pdo_update($this->table_member, $data, array('id' => $id));
        }
        message_tip('数据更新成功', $this->createWebUrl('admin', array('r' => 'member')), 'success');
    }
    $member = pdo_get($this->table_member, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($member)) {
        $member = array('status' => 2, 'integral' => 0, 'ulevel' => 1, 'partyday' => date('Y-m-d'), 'birthday' => date('Y-m-d'), 'sex' => 1, 'priority' => 0);
    } else {
        $branch = pdo_get($this->table_branch, array('id' => $member['branchid'], 'uniacid' => $_W['uniacid']));
    }
} elseif ($op == 'setintegral') {
    $ret = array('state' => 'error', 'msg' => 'error');
    $memberid = intval($_GPC['memberid']);
    $integral = intval($_GPC['integral']);
    $remark = trim($_GPC['remark']);
    $member = pdo_get($this->table_member, array("uniacid" => $_W['uniacid'], "id" => $memberid, "recycle" => 0));
    if (empty($member)) {
        $ret['msg'] = "党员信息不存在！";
        exit(json_encode($ret));
    }
    if ($integral == 0) {
        $ret['msg'] = "积分变动值不能为零！";
        exit(json_encode($ret));
    }
    $memberintegral = $integral + $member['integral'];
    if ($memberintegral < 0) {
        $ret['msg'] = "党员修改后的积分总值不能为负！";
        exit(json_encode($ret));
    }
    $integraldata = array('uniacid' => $_W['uniacid'], 'memberid' => $memberid, 'channel' => "system", 'foreignid' => 0, 'integral' => $integral, 'remark' => empty($remark) ? "系统设置" : $remark, 'iyear' => date("Y"), 'imonth' => date("Ym"), 'iweek' => date("oW"), 'createtime' => time());
    pdo_insert($this->table_integral, $integraldata);
    pdo_update($this->table_member, array('integral' => $memberintegral), array('id' => $memberid));
    $ret['state'] = 'success';
    $ret['msg'] = 'success';
    exit(json_encode($ret));
} elseif ($op == 'recycle') {
    $con = ' WHERE m.uniacid=:uniacid AND m.recycle=1 ';
    $par[':uniacid'] = $_W['uniacid'];
    $pindex = max(1, intval($_GPC['page']));
    $psize = 50;
    $list = pdo_fetchall("SELECT m.*,b.name FROM " . tablename($this->table_member) . " m LEFT JOIN " . tablename($this->table_branch) . " b ON m.branchid=b.id " . $con . " ORDER BY m.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, $par);
    $total = pdo_fetchcolumn('SELECT count(m.id) FROM ' . tablename($this->table_member) . " m " . $con, $par);
    $pager = pagination($total, $pindex, $psize);
} elseif ($op == 'setrecycle1') {
    $id = intval($_GPC['id']);
    $member = pdo_get($this->table_member, array('id' => $id, 'uniacid' => $_W['uniacid'], "recycle" => 0));
    if (empty($member)) {
        message_tip('要删除的记录信息不存在！', referer(), 'error');
    }
    pdo_update($this->table_member, array('openid' => "", 'recycle' => 1), array('id' => $id));
    message_tip('用户信息删除成功！', referer(), 'success');
}
include $this->template('admin/member');
?>











