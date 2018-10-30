<?php
/**
 * Created by PhpStorm.
 * User: dre2k
 * Date: 2018-10-30
 * Time: 14:11
 */

class Category
{
    const DEFAULT_PARENT_ID = 0;

    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    private $name;
    /**
     * @return mixed
     */
    public function getName()
    {
        return  '-' . $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


    private $parent_category_id = self::DEFAULT_PARENT_ID;


    /**
     * @return int
     */
    public function getParentCategoryId(): int
    {
        return $this->parent_category_id;
    }

    /**
     * @param int $parent_category_id
     */
    public function setParentCategoryId(int $parent_category_id): void
    {
        $this->parent_category_id = $parent_category_id;
    }

    /**
     * Category constructor.
     * @param int $id
     * @param string $name
     * @param int $parent_category_id
     */
    public function __construct(int $id, string $name, int $parent_category_id = self::DEFAULT_PARENT_ID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_category_id = $parent_category_id;
    }
}