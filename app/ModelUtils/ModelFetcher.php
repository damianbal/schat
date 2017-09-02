<?php

namespace App\ModelUtils;

/**
 * Return your json with relationships
 *
 */
class ModelFetcher
{
    /**
     * @property $collection
     */
    protected $collection = [];

    /**
     * @property $collection
     */
    protected $fetch_info = [];

    /**
     *
     */
    public function __construct($collection)
    {
        $this->collection = new $collection;
    }

    /**
     *
     */
    public function addFetchInfo($relationship, $attribute, $new_attribute_name = '')
    {
        if(strlen($new_attribute_name) < 1)
            $new_attribute_name = $relationship . '_' . $attribute;

        $this->fetch_info[] = [
            'relationship' => $relationship,
            'attribute' => $attribute,
            'new_attribute_name' => $new_attribute_name
        ];
    }

    /**
     *
     */
    public function get($attributes)
    {
        $new_collection = [];

        foreach($this->collection as $collection_item)
        {
            $new_collection_item = [];
            foreach($attributes as $attr)
            {
                $new_collection_item[$attr] = $collection_item->{$attr};
            }
        }

        return $new_collection;
    }
}
