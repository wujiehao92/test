<?php
namespace Wotu\auth\user;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\user\CreateUserDto;


class User extends AuthBase {

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *当前用户信息
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/queryByCodeUsingGET
     */
    public  function getUserInfo(){
        $url = $this->domainUrl . '/auth/user/v1/info';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * sdk 创建用户
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/createUserUsingPOST
     */
    public function create($params){
        $url = $this->domainUrl . '/auth/user/v1/create';
        $requestDto = new CreateUserDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *用户组织
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/organizationListUsingGET
     */
    public  function getMyOrganization(){
        $url = $this->domainUrl . '/auth/user/v1/organization_list';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *我的用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/groupListUsingGET
     */
    public  function getMyGroup(){
        $url = $this->domainUrl . '/auth/user/v1/group_list';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }







}