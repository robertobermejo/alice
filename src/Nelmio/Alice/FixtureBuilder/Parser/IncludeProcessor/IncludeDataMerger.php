<?php

/*
 * This file is part of the Alice package.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\Alice\FixtureBuilder\Parser\IncludeProcessor;

final class IncludeDataMerger
{
    /**
     * Merges a parsed file data with another. If some data overlaps, the existent data is kept, i.e. the included data
     * is discarded.
     *
     * @param array $data        Parsed file data
     * @param array $includeData Parsed file data to merge
     *
     * @return array
     */
    public function mergeInclude(array $data, array $includeData): array
    {
        foreach ($data as $class => $fixtures) {
            // $class is either a FQCN or 'parameters'
            $includeData[$class] = isset($includeData[$class]) && is_array($includeData[$class])
                ? array_merge($includeData[$class], $fixtures)
                : $fixtures
            ;
        }

        return $includeData;
    }
}