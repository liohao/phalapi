<?php
/**
 * PhalApi_Cache_Memcached MC缓存
 *
 * - 使用序列化对需要存储的值进行转换，以提高速度
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-11-14
 */

class PhalApi_Cache_Memcached extends PhalApi_Cache_Memcache {

    /**
     * 注意参数的微妙区别
     */
    public function set($key, $value, $expire = 600) {
        $this->memcache->set($this->formatKey($key), @serialize($value), $expire);
    }

    /**
     * 返回更高版本的MC实例
	 * @return Memcached
     */
    protected function createMemcache() {
        return new Memcached();
    }
}