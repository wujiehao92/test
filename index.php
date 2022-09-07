<?php
require "vendor/autoload.php";

//\Wotu\Test::getCity();

//var_dump((new \Wotu\auth\user\User())->getUserInfo());

$sitePageParam = [
    'name' =>  'wjh'//站点名
];
//var_dump((new \Wotu\auth\site\Site())->getSiteList($sitePageParam));

$baseInfo = array(
    "adminDomain" => "",//管理系统域名
    "alias" => "wjhetst",//别名   /*必填*/
    "area" => 0,//区编码
    "city" => 0,//市编码
    "contactDept" => "",//联系人部门
    "contactMobile" => "",//联系人手机
    "contactName" => "",//联系人
    "contactPost" => "",//联系人职位
    "expireTime" => 0,//到期时间, 13位时间戳
    "name" => "",//名称
    "padDomain" => "",//	pad域名
    "pcDomain" => "",//pc域名
    "province" => 0,//省编码
    "shortName" => "",//简称
    "status" => 0,//状态，0正常1禁用
    "wapDomain" => ""//移动端域名
);
//var_dump((new \Wotu\auth\site\Site())->updateSite(1,$baseInfo));

//var_dump((new \Wotu\auth\user\User())->getUserInfo());
 $createUser = array(
    "idCard" => "330724199212311629",
    "isCertify" => false,
    "mobile" => "18768189823",
    "name" => "1231",
    "password" => "Wujiehao.12345",
    "sid" => 1,
     "groupList" => [3,2]
);

//var_dump((new \Wotu\auth\user\User())->create($createUser));


$groupList = array(
    "sid" => 1,
    "type" => 0,
    'id' => 2,
);
//var_dump((new \Wotu\auth\user\UserGroup())->groupList($groupList));

//var_dump((new \Wotu\auth\organization\Organization())->getOrganizationInfo('ORG2208101FG86EPS'));

$createOrganiza = array(
    "area" => 330102,
    "city" => 330100,
    "industryId" => 3,//行业id
    "name" => "12312312",
    "province" => 330000,
    "scale" => 2,//规模  category中获取  scale
    "sid" => 1,
    "certifyStatus" => false,
    "certifyImage" => "12313",
    "companyCode" => "123123",
    "userCode" => "6",
    "code" => "ORG22090110IELQM8"
);
//var_dump((new \Wotu\auth\organization\Organization())->create($createOrganiza));
//var_dump((new \Wotu\auth\organization\Organization())->edit($createOrganiza));
//var_dump((new \Wotu\auth\organization\Organization())->deleteOrganization('ORG22090110IELQM8'));

$createStaff = array(
    "idCard" => "330724199212311615",
    "mobile" => "187671787",
    "name" => "1231",
    "organizationCode" => "ORG2207281OW431TS",//组织编码
    "roleCode" => "",//角色编码
    "departmentCode" => "", //部门编码
    "sid" => 1,
);
//var_dump((new \Wotu\auth\organization\Organization())->createStaff(['staffList' => [$createStaff]]));
 $deleteStaff = array(
    "organizationCode" => "ORG2208161LDJWEIO",//组织编码
    "staffList" => [
        'USER22090212DFMGHS',
        'USER22090212CR3O5C'
    ],//删除的员工编码
);
//var_dump((new \Wotu\auth\organization\Organization())->deleteStaff($deleteStaff));


$createRole = array(
//        "code" => "",
    "description" => "2312312",
    "name" => "php-sdk",
    "organizationCode" => "ORG2208161LDJWEIO",
);
//var_dump((new \Wotu\auth\organization\Role())->createRole($createRole));
$editRole = array(
        "code" => "ROL2209051DATYYGW",
    "description" => "sdsdf",
    "name" => "php-sdk2",
    "organizationCode" => "ORG2208161LDJWEIO",
);
//var_dump((new \Wotu\auth\organization\Role())->editRole($editRole));


//var_dump((new \Wotu\auth\organization\Role())->deleteRole("ROL2209051DATYYGW"));


//var_dump((new \Wotu\auth\organization\Role())->roleList("ORG2208161LDJWEIO"));

$rolePermission = array(
    "sid" => 1,//站点id
    "roleCode" => "",//角色编码   全权限列表该值不传 或空
);
//var_dump((new \Wotu\auth\organization\Role())->rolePermissionList($rolePermission));


//var_dump((new \Wotu\id\id\Id())->nextId());

//var_dump((new \Wotu\auth\commonData\Category())->list("contract_settle_type"));

//var_dump((new \Wotu\admin\role\Role())->rolePermission("22090213YD71FK"));


//var_dump((new \Wotu\auth\commonData\City())->list("330000"));

$idCard = array(
    "address" => "safsdfa",//详细地址
    "birthday" => 1231231211131,//生日
    "expiredTime" => null,//身份证过期时间
    "idCard" => "533527199506110421",//身份证号
    "name" => "余润",//姓名
    "result" => "验证失败",//结果  默认  验证成功
    "resultCode" => -1,// 0成功 -1失败
    "sex" => 0,//1男 2女
    "type" => 1,//1系统验证 2人工验证
);
//var_dump((new \Wotu\auth\cms\IdCard())->addIdCard($idCard));
//var_dump((new \Wotu\auth\cms\IdCard())->editIdCard($idCard));

//var_dump((new \Wotu\auth\cms\IdCard())->delete($idCard));

//var_dump((new \Wotu\auth\cms\IdCard())->queryInfo($idCard));

$companyCredit = array(
    "address" => "aaa",//详细地址
    "companyCode" => "91500113060515743F",//统一信用代码
    "legalName" => "重庆康安家俬有限公司",//法人姓名
    "name" => "重庆康安家俬有限公司",//企业名称
    "registerMoney" => "11w",//注册资金
    "result" => "验证失败",//结果  success为验证通过
);

//var_dump((new \Wotu\auth\cms\CompanyCredit())->addCompanyCredit($companyCredit));
//var_dump((new \Wotu\auth\cms\CompanyCredit())->editCompanyCredit($companyCredit));

//var_dump((new \Wotu\auth\cms\CompanyCredit())->delete($companyCredit));

//var_dump((new \Wotu\auth\cms\CompanyCredit())->queryInfo($companyCredit));