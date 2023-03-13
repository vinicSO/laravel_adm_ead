<?php

if ( !function_exists('convertItemsOfArrayToObject')) {

    function convertItemsOfArrayToObject ( array $items ): array
    {
        $items = array_map( function ( $user )
        {
            $stdClass = new stdClass;

            foreach ( $user as $key => $value )
            {
                $stdClass->{ $key } = $value;
            }

            return $stdClass;
        }, $items);

        return $items;
    }
    
}
