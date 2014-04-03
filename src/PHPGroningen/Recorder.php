<?php

/**
 * Recorder.
 *
 * @package PHPGroningen
 * @subpackage Recorder
 */

namespace PHPGroningen;

/**
 * Recorder.
 */
class Recorder
{
    protected $records = array();

    /**
     * Record
     *
     * @param string $value
     * @return Recorder $this
     */
    public function record($value)
    {
        $this->records[] = $value;
    }

    /**
     * Get records
     *
     * @return array $this->records
     */
    public function getRecords()
    {
        return $this->records;
    }


}

