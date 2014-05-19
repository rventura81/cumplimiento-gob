<?php

namespace Modernizacion\Helpers;

use Scalia\SphinxSearch\SphinxSearch;

/**
 * Class SearchHelper
 * @package Modernizacion\Helpers
 */
class SphinxHelper {

    /**
     * @var SphinxSearch
     */
    private $sphinx = null;

    /**
     * @param SphinxSearch $sphinx
     */
    function __construct(SphinxSearch $sphinx){
        $this->sphinx = $sphinx;
    }

    /**
     * @param $text
     * @param array $filters
     * @return array
     */
    public function search($text, $filters = array()){
        $ids = $filters = array();
        $result = $this->sphinx->search($text, 'compromisos_index')->get();

        if(!$result || !isset($result['matches']))
            return array('ids' => null, 'filters' => null);


        foreach($result['matches'] as $id => $match){
            array_push($ids, $id);
            foreach($match['attrs'] as $filter_key => $value){
                if(!isset($filters[$filter_key]))
                    $filters[$filter_key] = array();

                array_push($filters[$filter_key], $value);
            }
        }

        return array('ids' => $ids, 'filters' => $filters);
    }

}