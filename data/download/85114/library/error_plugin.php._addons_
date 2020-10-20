<?php

/**
 * error_plugin.php
 *
 * @description :   公共错误类
 *
 * @author : zhaoxichao
 * @since : 01/06/2019
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class error_plugin {
    /**
     * 入参错误码
     */
    const ERROR_PARAMS_INVALID              =     10001;  //输入参数非法
    const ERROR_PARAMS_EMPTY                =     10002;  //输入参数为空

    /**
     *  返回结果错误码
     */
    const ERROR_RESULT_EMPTY                =     20003;  //返回结果为空

    /**
     * 数据库操作错误码
     */
    const ERROR_SELECT_DATA_EMPTY           =     30001;  //查询数据为空
    const ERROR_INSERT_DATA_ERROR           =     30002;  //插入数据错误
    const ERROR_UPDATE_DATA_ERROR           =     30003;  //更新数据错误
    const ERROR_DELETE_DATA_ERROR           =     30004;  //删除数据错误
    const ERROR_INSERT_DATA_DUPLICATE       =     30005;  //插入数据重复
    const ERROR_DELETE_DATA_EMPTY           =     30006;  // 删除数据已不存在

    /**
     * 业务逻辑错误码
     */
    const ERROR_SIGN_ERROR                  =     40001;  //SIGN校验失败
    const ERROR_TOKEN_ERROR                 =     40002;  //TOKEN校验失败
    const ERROR_LOGIN_FAILED                =     40003;  //用户登录失败
    const ERROR_LOGIN_USERNAME_EMPTY        =     40004;  //请输入用户账号
    const ERROR_LOGIN_PASSWORD_EMPTY        =     40005;  //请输入用户密码
    const ERROR_LOGIN_USERNAME_INVAILD      =     40006;  //用户账号不存在
    const ERROR_LOGIN_PASSWORD_INVAILD      =     40007;  //用户密码错误
    const ERROR_REGISTER_USERNAME_EXITED    =     40008;  //用户名已存在
    const ERROR_REGISTER_FAILED             =     40009;  //用户注册失败
    const ERROR_ACTION_INVALID              =     40010;  //ACTION非法操作
    const ERROR_MOD_INVALID                 =     40011;  //MOD非法操作
    const ERROR_UPLOAD_FILE_ERROR           =     40012;  //上传文件非法
    const ERROR_UPLOAD_IMAG_FAILED          =     40013;  //上传文件失败
    const ERROR_ILLEGAL_ACCESS_ERROR        =     40014;  //访问非法
    const ERROR_ADVERT_TYPE                 =     40015;  //广告插入标识非法
    const ERROR_QUERY_EMPTY                 =     40016;  //检索词为空
    const ERROR_QUERY_RESULE_EMPTY          =     40017;  //检索结果为空
    const ERROR_REGISTER_EMAIL_EMPTY        =     40018;  //请输入用户邮箱
    const ERROR_LOGIN_MUST                  =     40019;  //请登录
    const ERROR_SECRETKEY_EMPTY             =     40020;  //请在后台配置secretkey
    const ERROR_TOKEN_MAKE_FAILED           =     40021;  //生成token失败
    const ERROR_TOKEN_EMPTY                 =     40022;  //token参数为空
    const ERROR_COLLECT_DUMPLICATE          =     40023;  //收藏重复
    const ERROR_COLLECT_CANCEL              =     40024;  //已取消收藏
    const ERROR_DOMAIN_EMPTY                =     40025;  //DOMAIN常量初始化错误
    const ERROR_CHARSET_EMPTY               =     40026;  //discuz编码常量初始化失败
    const ERROR_LOGIN_MUST_SPECIAL          =     40027;  //当前板块只有特定用户才能查看，是否前往登录
    const ERROR_LOGIN_MUST_SPECIAL_USER     =     40028;  //本板块只有特定用户可以访问
    const ERROR_FORUM_VIEW_PERM             =     50001;  //无当前板块查看权限
    const ERROR_FORUM_VIEW_PERM_PWD         =     50002;  //请输入当前板块查看密码
    const ERROR_THREAD_VIEW_PERM_PWD        =     50004;  //帖子需要输入密码
    const ERROR_FORUM_VIEW_PERM_PWD_INVALID =     50005;  //您输入的密码错误,请重新输入
    const ERROR_DZ_ACCOUNT_BINDED           =     50006;  //此账号已与其他百度账号绑定，请绑定后再尝试，或是用其他论坛账号
    const ERROR_JSON_DECODE                 =     60001;  //json_decode()错误
    const ERROR_GET_OAUTH                   =     60002;  //获取oauth错误
    const ERROR_MUST_BINDED                 =     70001;  //请绑定百度账号与论坛账号
    const ERROR_AUTO_LOGIN                  =     70002;  //一键登录失败
    const ERROR_HAD_BINDED                  =     70003;  //已绑定百度账号,请直接登录
    const ERROR_HAD_BINDED_COMMON           =     70004;  //已绑定百度账号

    // 搜索的相关错误
    const ERROR_SEARCH_FORUM_CLOSED         =     80001;    // 论坛搜索已关闭
    const ERROR_SEARCH_GROUP_NOPERMISSION   =     80002;    // 您所在的用户组无法进行此操作
    const ERROR_SEARCH_FORUM_INVALID        =     80003;    // 您尚未指定搜索论坛的范围
    const ERROR_SEARCH_KEYWORD_EMPTY        =     80004;    // 搜索关键词为空
    const ERROR_SEARCH_ID_INVALID           =     80005;    // 您指定的搜索不存在或已过期
    const ERROR_SEARCH_TOOMANY              =     80006;    // 搜索太频繁 1分钟设置20次

    // 任务相关错误
    const ERROR_LAST_TASK_NO_END            =     90001;    // 上个任务未执行结束
    
    // 附件下载错误
    const ATTACHMENT_NONEXISTENCE           =     90100;    // 附件不存在



    /**
     * @var array   异常消息提示
     */
    public static $ERROR_MSG = array(
        self::ERROR_PARAMS_INVALID              =>	"输入参数非法",
        self::ERROR_PARAMS_EMPTY                =>	"输入参数为空",
        self::ERROR_RESULT_EMPTY                =>	"返回结果为空",
        self::ERROR_SELECT_DATA_EMPTY           =>	"查询数据为空",
        self::ERROR_INSERT_DATA_ERROR           =>	"插入数据错误",
        self::ERROR_UPDATE_DATA_ERROR           =>	"更新数据错误",
        self::ERROR_DELETE_DATA_ERROR           =>	"删除数据错误",
        self::ERROR_INSERT_DATA_DUPLICATE       =>	"插入数据重复",
        self::ERROR_DELETE_DATA_EMPTY           =>  "删除数据已不存在",
        self::ERROR_SIGN_ERROR                  =>	"sign校验失败",
        self::ERROR_TOKEN_ERROR                 =>	"token校验失败",
        self::ERROR_LOGIN_FAILED                =>	"用户登录失败",
        self::ERROR_REGISTER_USERNAME_EXITED    =>	"用户名已存在",
        self::ERROR_ACTION_INVALID              =>	"ACTION非法操作",
        self::ERROR_UPLOAD_FILE_ERROR           =>	"上传文件非法",
        self::ERROR_UPLOAD_IMAG_FAILED          =>	"上传文件失败",
        self::ERROR_ILLEGAL_ACCESS_ERROR        =>	"访问非法",
        self::ERROR_MOD_INVALID                 =>	"MOD非法操作",
        self::ERROR_ADVERT_TYPE                 =>	"广告插入标识非法",
        self::ERROR_QUERY_EMPTY                 =>	"检索词为空",
        self::ERROR_QUERY_RESULE_EMPTY          =>	"检索结果为空",
        self::ERROR_LOGIN_USERNAME_EMPTY        =>	"请输入用户账号",
        self::ERROR_LOGIN_PASSWORD_EMPTY        =>	"请输入用户密码",
        self::ERROR_LOGIN_USERNAME_INVAILD      =>	"用户账号不存在",
        self::ERROR_LOGIN_PASSWORD_INVAILD      =>	"用户密码错误",
        self::ERROR_REGISTER_FAILED             =>	"用户注册失败",
        self::ERROR_REGISTER_EMAIL_EMPTY        =>	"请输入用户邮箱",
        self::ERROR_LOGIN_MUST                  =>	"请登录",
        self::ERROR_SECRETKEY_EMPTY             =>	"未设置管理后台 论坛完整域名 参数",
        self::ERROR_TOKEN_MAKE_FAILED           =>	"生成token失败",
        self::ERROR_TOKEN_EMPTY                 =>	"token参数为空",
        self::ERROR_COLLECT_DUMPLICATE          =>	"已收藏",
        self::ERROR_COLLECT_CANCEL              =>	"已取消收藏",
        self::ERROR_DOMAIN_EMPTY                =>	"未设置管理后台 APP Secret 参数",
        self::ERROR_CHARSET_EMPTY               =>	"discuz编码常量初始化失败",
        self::ERROR_FORUM_VIEW_PERM             =>	"无当前板块查看权限",
        self::ERROR_FORUM_VIEW_PERM_PWD         =>	"请输入当前板块查看密码",
        self::ERROR_THREAD_VIEW_PERM_PWD        =>  "本帖为密码帖，需要输入密码",
        self::ERROR_FORUM_VIEW_PERM_PWD_INVALID =>  "您输入的密码错误，请重新输入",
        self::ERROR_JSON_DECODE                 =>  "json_decode()错误",
        self::ERROR_GET_OAUTH                   =>  "获取oauth错误",
        self::ERROR_MUST_BINDED                 =>  "请绑定百度账号与论坛账号",
        self::ERROR_AUTO_LOGIN                  =>  "一键登录失败",
        self::ERROR_HAD_BINDED                  =>  "已绑定百度账号,请直接登录",
        self::ERROR_HAD_BINDED_COMMON           =>  "已绑定百度账号",
        self::ERROR_LOGIN_MUST_SPECIAL          =>  "当前板块只有特定用户才能查看，是否前往登录",
        self::ERROR_LOGIN_MUST_SPECIAL_USER     =>  "本板块只有特定用户可以访问",
        self::ERROR_DZ_ACCOUNT_BINDED           =>  "此账号已与其他百度账号绑定，请绑定后再尝试，或是用其他论坛账号",

        self::ERROR_SEARCH_FORUM_CLOSED         =>  "抱歉，论坛搜索已关闭",
        self::ERROR_SEARCH_GROUP_NOPERMISSION   =>  "抱歉，您所在的用户组无法进行此操作",
        self::ERROR_SEARCH_FORUM_INVALID        =>  "抱歉，您尚未指定搜索论坛的范围",
        self::ERROR_SEARCH_KEYWORD_EMPTY        =>  "抱歉，您未传搜索的关键词",
        self::ERROR_SEARCH_ID_INVALID           =>  "抱歉，您指定的搜索不存在或已过期",
        self::ERROR_SEARCH_TOOMANY              =>  "抱歉，站点设置每分钟系统最多响应搜索请求20次，请稍候再试",
        self::ERROR_LAST_TASK_NO_END            =>  "抱歉，上个任务还未结束",

        self::ATTACHMENT_NONEXISTENCE           =>  "抱歉，该附件无法读取",
    );
}