<?php

namespace Src\Collection;

/**
 * Collectable is a container for key/value pairs.
 *
 * 用來處理 key/value pairs 的集合
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface Collectable
{
    /**
     * 返回集合所有的資料
     *
     * @return array An array of parameters
     */
    public function all();

    /**
     * 返回集合的索引
     *
     * Returns the parameter keys.
     *
     * @return array An array of parameter keys
     */
    public function keys();

    /**
     * 替換整個集合的內容
     *
     * Replaces the current parameters by a new set.
     */
    public function replace(array $parameters = []);

    /**
     * 返回指定索引的內容物
     *
     * Returns a parameter by name.
     *
     * @param string $key 要存取集合內容物的索引
     * @param mixed $default 預設值 The default value if the key does not exist
     *
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * 替指定的索引配置內容物
     *
     * Sets a parameter by name.
     *
     * @param mixed $value The value
     */
    public function set(string $key, $value);

    /**
     * 檢查索引內有沒有這個索引
     *
     * Returns true if the parameter is defined.
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has(string $key);

    /**
     * 返回符合查詢條件的內容物
     *
     * 效果類似 SQL 的 WHERE
     *
     * WHERE {$key} = {$condition}
     *
     * @param string $key 指定的索引
     * @param string|int $condition 查詢條件
     *
     * @return mixed
     */
    public function where(string $key, $condition);

    /**
     * 移除指定索引的內容物
     * 
     * Removes a parameter.
     */
    public function remove(string $key);

    /**
     * Returns the number of parameters.
     *
     * @return int The number of parameters
     */
    public function count();
}