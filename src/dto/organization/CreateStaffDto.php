<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class CreateStaffDto extends NormalBaseDto
{
    protected $param = array(
        "idCard" => "",
        "mobile" => "",
        "name" => "",
        "organizationCode" => "",//组织编码
        "roleCode" => "",//角色编码
        "departmentCode" => "", //部门编码
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["name", "idCard","mobile","organizationCode"]);
    }
}