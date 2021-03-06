<?php

namespace OpenApi\Examples\UsingTraits\Decoration;

/**
 * @OA\Schema(title="Whistles trait")
 */
trait Whistles
{
    /**
     * The bell.
     *
     * @OA\Property(example="bone whistle")
     */
    public $whistle;
}
