<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

class Article
{
    private $id;
    private $title;
    private $content;

    public function __construct(array $array = null) {
        if (null !== $array)
            $this->hydrate($array);
    }

    private function hydrate($array) {
        foreach ($array as $attribute => $value) {
            $method = 'set'.ucfirst($attribute);
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                throw new BadMethodCallException(sprintf(
                    'Attribute "%s" or method "%s" does not exists',
                    $attribute, $method
                ));
            }
        }
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

}