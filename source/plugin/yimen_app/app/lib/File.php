<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/18 9:33
 * @Last Modified by: ofearn@qq.com
 */

namespace app\lib;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class File
{
    /**
     * 递归创建文件夹
     *
     * @param $path
     * @return bool
     */
    public static function mkdirs($path)
    {
        if (!is_dir($path)) {
            self::mkdirs(dirname($path));
            if (!mkdir($path, 0777)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 根据UID生成目录结构
     * @param $uid
     * @return mixed|string
     */
    public static function getPathByUid($uid)
    {
        $path = sprintf("%09d", $uid);
        $path = substr_replace($path, '/', 3, 0);
        $path = substr_replace($path, '/', 6, 0);
        $path = substr_replace($path, '/', 9, 0);
        return $path;
    }

    public static function getFileLine()
    {
        $files = self::findSqlFile();
        $lines = array();
        foreach ($files as $file) {
            $cuts = file($file, FILE_IGNORE_NEW_LINES);
            $lines_arr = array();
            foreach ($cuts as $key => $line) {
                if ($line != '') {
                    $line = explode("\t", $line);
                    unset($line[0]);
                    $lines_arr[] = $line;
                }
            }
            $lines = array_merge($lines, $lines_arr);
        }
        return $lines;
    }

    public static function findSqlFile()
    {
        $files = glob(DISCUZ_ROOT . './data/log/*_sql.php');
        return $files;
    }
}